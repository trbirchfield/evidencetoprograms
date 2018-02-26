<?php namespace App\Repositories;

use App\Models\User;
use App\Models\UserData;
use App\Models\Status;
use Bican\Roles\Models\Role;
use Cache;
use Config;
use DB;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Log;

class UserRepositoryEloquent implements UserRepository {
	/**
	 * Eloquent model object.
	 *
	 * @var User
	 */
	protected $model;

	/**
	 * Eloquent model object.
	 *
	 * @var UserData
	 */
	protected $data;

	/**
	 * Eloquent model object.
	 *
	 * @var Status
	 */
	protected $status;

	/**
	 * Setup instance.
	 *
	 * @param User $model
	 * @param UserData $data
	 * @param Status $status
	 */
	public function __construct(User $model, UserData $data, Status $status) {
		$this->model  = $model;
		$this->data   = $data;
		$this->status = $status;
	}

	/**
	 * Return all records.
	 *
	 * @param array $columns
	 * @return array|NULL
	 */
	public function all($columns = ['*']) {
		try {
			$res = Cache::remember('users.all', Config::get('cache.duration.hour'), function() use($columns) {
				return $this->model->get($columns);
			});
			$list = [];
			foreach ($res as $row) {
				$list[] = $row->toArray();
			}

			return $list;
		} catch (Exception $e) {
			Log::error($e);
		}

		return NULL;
	}

	/**
	 * Find record by id.
	 *
	 * @param int $id
	 * @param array $columns
	 * @return array|NULL
	 */
	public function find($id, $columns = ['*']) {
		try {
			return Cache::remember('users.find.' . $id, Config::get('cache.duration.hour'), function() use($id, $columns) {
				$record = $this->model->with('data')->findOrFail($id, $columns)->toArray();
				if (isset($record['data'])) {
					$data = $this->data;
					$record['account']  = [];
					$record['personal'] = [];
					foreach ($record['data'] as $v) {
						if ($v['type'] == $data::ACCOUNT) {
							$record['account'][$v['key']] = $v['value'];
						} elseif ($v['type'] == $data::PERSONAL) {
							$record['personal'][$v['key']] = $v['value'];
						}
					}
					unset($record['data']);
				}
				if (isset($record['stripe_id'])) {
					$customer = $this->model->subscription()->getStripeCustomer($record['stripe_id']);
					$card     = $customer->sources->retrieve($customer->default_source);
					$record['card'] = [
						'last4'     => $card->last4,
						'exp_month' => $card->exp_month,
						'exp_year'  => $card->exp_year
					];
				}
				////////
				// TODO: remove after testing
				$record['card'] = [
					'last4'     => '1234',
					'exp_month' => '12',
					'exp_year'  => '2020'
				];
				////////

				return $record;
			});
		} catch (ModelNotFoundException $e) {
			return NULL;
		} catch (Exception $e) {
			Log::error($e);
		}

		return NULL;
	}

	/**
	 * Find record by a specific field value.
	 *
	 * @param string $key
	 * @param string $val
	 * @param array $columns
	 * @return array|NULL
	 */
	public function findBy($key, $val, $columns = ['*']) {
		try {
			return Cache::remember('users.findBy.' . $key . '.' . str_slug($val), Config::get('cache.duration.hour'), function() use($key, $val, $columns) {
				return $this->model->where($key, $val)->firstOrFail($columns)->toArray();
			});
		} catch (ModelNotFoundException $e) {
			return NULL;
		} catch (Exception $e) {
			Log::error($e);
		}

		return NULL;
	}

	/**
	 * Save values.
	 *
	 * @param array $input
	 * @return array
	 */
	public function save($input = []) {
		try {
			// Init response
			$response = ['success' => FALSE];

			// Set values and save
			if (!empty($input['id'])) {
				$this->model = $this->model->findOrFail($input['id']);
			}
			if (!$this->model->fill($input)->save()) {
				throw new Exception('Unable to save User, please try again.');
			}

			// User data
			// TODO: extract to single method
			if (isset($input['account'])) {
				$data = $this->data;
				$type = $data::ACCOUNT;
				$this->data->where(['user_id' => $this->model->id, 'type' => $type])->delete();
				foreach ($input['account'] as $k => $v) {
					if (!empty($v)) {
						if (is_array($v)) {
							$v = json_encode($v);
						}
						$this->data->create([
							'user_id' => $this->model->id,
							'type'    => $type,
							'key'     => $k,
							'value'   => $v
						]);
					}
				}
			}
			if (isset($input['personal'])) {
				$data = $this->data;
				$type = $data::PERSONAL;
				$this->data->where(['user_id' => $this->model->id, 'type' => $type])->delete();
				foreach ($input['personal'] as $k => $v) {
					if (!empty($v)) {
						if (is_array($v)) {
							$v = json_encode($v);
						}
						$this->data->create([
							'user_id' => $this->model->id,
							'type'    => $type,
							'key'     => $k,
							'value'   => $v
						]);
					}
				}
			}

			// Set roles and permissions
			if (isset($input['role'])) {
				$role = Role::where('slug', $input['role'])->firstOrFail();
				$this->model->attachRole($role->id);
			}

			// Clear cache
			Cache::forget('users');

			// Success
			$response['success'] = TRUE;
			$response['message'] = 'User has been saved.';
			$response['id']      = $this->model->id;
		} catch (ModelNotFoundException $e) {
			$response['error'] = 'Record not found.';
		} catch (Exception $e) {
			Log::error($e);
			$response['error'] = $e->getMessage();
		}

		return $response;
	}

	/**
	 * Delete record by id.
	 *
	 * @param int $id
	 * @param bool $force
	 * @return bool
	 */
	public function delete($id, $force = FALSE) {
		try {
			// Find record to delete
			$this->model = $this->model->findOrFail($id);
			if ($force) {
				$this->model->forceDelete();
			} elseif (!$this->model->delete()) {
				throw new Exception('Error deleting User: ' . $id);
			}

			// Clear cache
			Cache::forget('users');

			// Response
			return TRUE;
		} catch (ModelNotFoundException $e) {

			Log::error($e);

			return FALSE;
		} catch (Exception $e) {
			Log::error($e);
		}

		return FALSE;
	}

	/**
	 * Build select list using given key and value field names.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @return array|NULL
	 */
	public function selectList($key, $val) {
		try {
			$res = Cache::remember('users.selectList.' . $key . '.' . $val, Config::get('cache.duration.hour'), function() use($val) {
				return $this->model->orderBy($val)->get();
			});
			$list = [];
			foreach ($res as $row) {
				$list[$row->{$key}] = $row->{$val};
			}

			return $list;
		} catch (Exception $e) {
			Log::error($e);
		}

		return NULL;
	}

	/**
	 * Return filtered records.
	 *
	 * @param array $input
	 * @return array
	 */
	public function filteredList($input = []) {
		try {
			// Init values
			$list           = [];
			$filtered_total = 0;

			// Build query
			$query = $this->model
				->select('users.id', 'users.title AS title', 'statuses.status AS status')
				->leftJoin('statuses', 'statuses.id', '=', 'users.status');
			if (isset($input['filter_status'])) {
				$query->where('users.status', $input['filter_status']);
			}
			if (isset($input['order_by'])) {
				$query->orderBy($input['order_by'], (($input['order_dir'] == 'desc') ? 'desc' : 'asc'));
			} else {
				$query->orderBy('title', 'asc');
			}
			// NOTE: Unsure how to handle FOUND_ROWS without raw sql. http://laravel.com/docs/5.0/pagination
			//       Handle the offset manually for now.
			// if (isset($input['offset']) and isset($input['limit'])) {
			// 	$query->skip($input['offset'])->take($input['limit']);
			// }
			$res = $query->get();

			// Filtered total
			$filtered_total = $res->count();

			// Load all into array, the apply offset/limit
			$list = [];
			foreach ($res as $row) {
				$list[] = $row->toArray();
			}
			if (isset($input['offset']) and isset($input['limit'])) {
				$list = array_slice($list, $input['offset'], $input['limit']);
			}

			// Prepare results if needed
			// foreach ($list as $k => $row) {

			// }
		} catch (Exception $e) {
			Log::error($e);
		}

		// Return
		return [
			'total'    => (string)$this->model->count(),
			'filtered' => (string)$filtered_total,
			'data'     => array_values($list)
		];
	}

	/**
	 * Set the value for the specified field.
	 *
	 * @param  string $key
	 * @param  string $val
	 * @param  int    $id
	 * @return array
	 */
	public function setValue($key, $val, $id) {
		try {
			// Init response
			$response = ['success' => FALSE];

			// Set value and save
			$this->model = $this->model->findOrFail($id);
			$this->model->{$key} = $val;
			if (!$this->model->save()) {
				throw new Exception('Unable to update User, please try again.');
			}

			// Clear cache
			Cache::forget('users');

			// Success
			$response['success'] = TRUE;
			$response['message'] = 'User has been updated.';
		} catch (ModelNotFoundException $e) {
			$response['error'] = 'Record not found.';
		} catch (Exception $e) {
			Log::error($e);
			$response['error'] = $e->getMessage();
		}

		return $response;
	}

	/**
	 * Return list of statuses.
	 *
	 * @return array
	 */
	public function statusList() {
		try {
			$status = $this->status;
			$res    = Cache::remember('users.statusList', Config::get('cache.duration.hour'), function() use($status) {
				return $this->status->whereIn('id', [$status::ACTIVE, $status::INACTIVE])->orderBy('status')->get();
			});
			$list = [];
			foreach ($res as $row) {
				$list[$row->id] = $row->status;
			}

			return $list;
		} catch (Exception $e) {
			Log::error($e);
		}

		return [];
	}

	/**
	 * Return list of followed candidates.
	 *
	 * @param int $id
	 * @return array
	 */
	public function followedCandidates($id) {
		try {
			$status = $this->status;
			$res    = Cache::remember('followedCandidates.' . $id, Config::get('cache.duration.hour'), function() use($id, $status) {
				return $this->model
					->select(
						'users.id',
						'users.fname',
						'users.lname',
						'followers.favorite'
					)
					->leftJoin('followers', 'followers.candidate_id', '=', 'users.id')
					->where('users.status', $status::ACTIVE)
					->where('followers.user_id', $id)
					->get()
				;
			});
			$list = [];
			foreach ($res as $row) {
				// Build related data ?
				// 		Federal / State / Local
				// 		search against?
				// 		position
				// 		match %
				$record = $row->toArray();


				$list[] = $record;
			}

			return $list;
		} catch (Exception $e) {
			Log::error($e);
		}

		return [];
	}

	/**
	 * Get candidate(s) for public profile/list.
	 *
	 * @param string $slug
	 * @param int $user_id
	 * @return array|NULL
	 */
	public function getCandidates($slug, $user_id) {
		try {
			// Find candidates
			if (is_null($slug)) {
				// All candidates
				$res = $this->model
					->select('users.id')
					->leftJoin('candidates', 'candidates.user_id', '=', 'users.id')->whereNotNULL('candidates.user_id')
					->get()
				;
			} else {
				// Try to find by slug first, if not found search by name
				list($slug, $name) = explode('/', $slug);
				$res = Cache::remember('getCandidates.' . $slug, Config::get('cache.duration.hour'), function() use($slug) {
					return $this->model
						->select('users.id')
						->leftJoin('candidates', 'candidates.user_id', '=', 'users.id')->whereNotNULL('candidates.user_id')
						->where('users.slug', $slug)
						->get()
					;
				});
				if ($res->count() < 1) {
					$suggest = TRUE;
					list($fname, $lname) = explode('-', $name);
					$res = $this->model
						->select('users.id')
						->leftJoin('candidates', 'candidates.user_id', '=', 'users.id')->whereNotNULL('candidates.user_id')
						->where(function($q) use($fname, $lname) {
							$q->where('users.fname', 'like', '%' . $fname . '%')->orWhere('users.lname', 'like', '%' . $lname . '%');
						})
						->get()
					;
				}
			}

			// Did we find anything?
			if ($res->count() < 1) {
				return NULL;
			}

			// Suggested list of matches?
			if (isset($suggest)) {
				$candidates = ['suggest' => []];
				foreach ($res as $row) {
					$data = $this->find($row->id, ['id', 'slug', 'fname', 'lname']);
					$data['url_to_profile'] = $data['slug'] . '/' . str_slug($data['personal']['display_name']);

					$candidates['suggest'][] = $data;
				}

				return $candidates;
			}

			// Followed and favorites
			$followed  = [];
			$favorites = [];
			if (isset($user_id)) {
				$this->model = $this->model->findOrFail($user_id);
				foreach ($this->model->candidates as $v) {
					$followed[] = $v->candidate_id;
					if ($v->favorite == 1) {
						$favorites[] = $v->candidate_id;
					}
				}
			}

			// Set candidate data
			$candidates = [];
			foreach ($res as $row) {
				$data = $this->find($row->id, ['id', 'slug', 'fname', 'lname', 'email', 'phone']);
				$data['url_to_profile'] = $data['slug'] . '/' . str_slug($data['personal']['display_name']);
				$data['followed']       = (in_array($row->id, $followed)) ? TRUE : FALSE;
				$data['favorite']       = (in_array($row->id, $favorites)) ? TRUE : FALSE;

				$candidates[] = $data;
			}

			return $candidates;
		} catch (Exception $e) {
			Log::error($e);
		}

		return NULL;
	}

	/**
	 * Get candidate(s) for public profile/list.
	 *
	 * @param string $slug
	 * @param int $user_id
	 * @return array|NULL
	 */
	public function getCandidate($slug, $user_id) {
		try {
			// Find candidate
			$row = Cache::remember('getCandidate.' . $slug, Config::get('cache.duration.hour'), function() use($slug) {
				return $this->model
					->leftJoin('candidates', 'candidates.user_id', '=', 'users.id')->whereNotNULL('candidates.user_id')
					->where('users.slug', $slug)
					->first()
				;
			});

			// Did we find anything?
			if (!$row->exists) {
				return NULL;
			}

			// Followed and favorites
			$followed  = [];
			$favorites = [];
			if (isset($user_id)) {
				$this->model = $this->model->findOrFail($user_id);
				foreach ($this->model->candidates as $v) {
					$followed[] = $v->candidate_id;
					if ($v->favorite == 1) {
						$favorites[] = $v->candidate_id;
					}
				}
			}

			// Add candidate data
			$data = $this->find($row->id, ['id', 'slug', 'fname', 'lname', 'email', 'phone']);
			$data['followed'] = (in_array($row->id, $followed)) ? TRUE : FALSE;
			$data['favorite'] = (in_array($row->id, $favorites)) ? TRUE : FALSE;

			return $data;
		} catch (Exception $e) {
			Log::error($e);
		}

		return NULL;
	}

	/**
	 * Search candidates.
	 *
	 * @param array $input
	 * @param int $user_id
	 * @return array|NULL
	 */
	public function searchCandidates($input, $user_id) {
		try {
			// Init return
			$candidates = [];

// DB::connection()->enableQueryLog();

			// Search
			$query = $this->model
				->select('users.id', 'users.slug', 'users.fname', 'users.lname')
				->leftJoin('candidates', 'candidates.user_id', '=', 'users.id')->whereNotNULL('candidates.user_id')
				->leftJoin('user_data', 'user_data.user_id', '=', 'users.id')
			;
			// TODO: election_Level = Federal/State/Local
			if (!empty($input['state'])) {
				// TODO: state = election state
			}
			if (!empty($input['local'])) {
				// TODO: local = election ???
			}
			if (!empty($input['party'])) {
				$query->where('user_data.key', 'party');
				$query->where('user_data.value', $input['party']);
			}
			if (isset($user_id) and isset($input['followed'])) {
				$query->leftJoin('followers', 'followers.candidate_id', '=', 'users.id');
				if (empty($input['followed'])) {
					$query->whereNotIn('followers.candidate_id', function($q) use($user_id) {
						$q->select('candidate_id')->from('followers')->where('user_id', $user_id);
					});
				} else {
					$query->where('followers.user_id', $user_id);
					if (isset($input['my_candidate'])) {
						$query->where('followers.favorite', $input['my_candidate']);
					}
				}
			}
			$query->addSelect(DB::raw('(SELECT count(id) FROM followers WHERE followers.candidate_id = users.id) AS num_followers'));
			$query->groupBy('users.id')->having('num_followers', '>=', $input['followers']);
			$res = $query->get();

// Log::debug($input);
// Log::debug(DB::getQueryLog());

			// Followed and favorites
			$followed  = [];
			$favorites = [];
			if (isset($user_id)) {
				$this->model = $this->model->findOrFail($user_id);
				foreach ($this->model->candidates as $v) {
					$followed[] = $v->candidate_id;
					if ($v->favorite == 1) {
						$favorites[] = $v->candidate_id;
					}
				}
			}

			// Prep return
			foreach ($res as $row) {
				$data      = $this->data;
				$user_data = $this->data->where(['user_id' => $row->id])->get();
				$candidate = $row->toArray();
				$candidate['account']  = [];
				$candidate['personal'] = [];
				foreach ($user_data as $v) {
					if ($v['type'] == $data::ACCOUNT) {
						$candidate['account'][$v['key']] = $v['value'];
					} elseif ($v['type'] == $data::PERSONAL) {
						$candidate['personal'][$v['key']] = $v['value'];
					}
				}
				$candidate['url_to_profile'] = $candidate['slug'] . '/' . str_slug($candidate['personal']['display_name']);
				$candidate['followed']       = (in_array($candidate['id'], $followed)) ? TRUE : FALSE;
				$candidate['favorite']       = (in_array($candidate['id'], $favorites)) ? TRUE : FALSE;

				$candidates[] = $candidate;
			}

			// Return
			return $candidates;
		} catch (Exception $e) {
			Log::error($e);
		}

		return NULL;
	}
}
