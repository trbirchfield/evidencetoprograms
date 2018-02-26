<?php namespace App\Models;

use Bican\Roles\Contracts\HasRoleAndPermissionContract;
use Bican\Roles\Models\Role;
use Bican\Roles\Traits\HasRoleAndPermission;
use Cache;
use Carbon\Carbon;
use Config;
use DB;
use Exception;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract {
	/**
	 * Traits
	 */
	use Authenticatable, CanResetPassword, SoftDeletes, HasRoleAndPermission;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fname', 'lname', 'email', 'password', 'phone', 'status'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Protect dates from direct assignment.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * Attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = ['id' => 'int'];

	/**
	 * Toggle status.
	 *
	 * @param int $id
	 * @return bool
	 */
	public function toggleStatus($id) {
		try {
			// Update status
			$user = $this->findOrFail($id);
			$user->status = ($user->status == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;
			$user->save();

			// Clear cache
			Cache::forget('users');

			return TRUE;
		} catch (Exception $e) {
			Log::error($e);

			return FALSE;
		}
	}

	/**
	 * Return data for Admin view.
	 *
	 * @param int $id
	 * @return array|NULL
	 */
	public function getAdminView($id) {
		try {
			return Cache::remember('users.getAdminView.' . $id, Config::get('cache.duration.hour'), function() use($id) {
				$user   = $this->findOrFail($id);
				$record = [
					'id'                => $user->id,
					'type'              => ($user->is('candidate')) ? 'Candidate' : 'Voter',
					'name'              => $user->name,
					'email'             => $user->email,
					'security_question' => UserData::where(['user_id' => $id, 'type' => UserData::ACCOUNT, 'key' => 'security_question'])->pluck('value'),
					'security_answer'   => UserData::where(['user_id' => $id, 'type' => UserData::ACCOUNT, 'key' => 'security_answer'])->pluck('value'),
					'photo'             => $user->photo
				];

				return $record;
			});
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}



	/**
	 * Return User Data for given key.
	 *
	 * @param int $id
	 * @param string $key
	 * @return string|NULL
	 */
	public function getUserDataForKey($id, $key = NULL) {
		try {
			return Cache::remember('users.getUserDataForKey.' . $id . $key , Config::get('cache.duration.hour'), function() use($id, $key) {
				return UserData::where(['user_id' => $id, 'key' => $key])->pluck('value');
			});
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}

	/**
	 * Return a list of membership types.
	 *
	 * @return array|NULL
	 */
	public function getMembershipTypes() {
		try {
			return Cache::remember('users.getMembershipTypes', Config::get('cache.duration.year'), function() {
				$list = [];
				$res  = Role::whereIn('slug', ['voter', 'candidate'])->orderBy('id')->get();
				foreach ($res as $row) {
					$list[] = $row->toArray();
				}

				return $list;
			});
		} catch (Exception $e) {
			log::error($e);

			return NULL;
		}
	}

	/**
	 * Return a list of statuses.
	 *
	 * @return array|NULL
	 */
	public function getStatuses() {
		try {
			return Cache::remember('users.getStatuses', Config::get('cache.duration.year'), function() {
				$list = [];
				$res  = Status::orderBy('id')->get();
				foreach ($res as $row) {
					$list[] = $row->toArray();
				}

				return $list;
			});
		} catch (Exception $e) {
			log::error($e);

			return NULL;
		}
	}

	/**
	 * Return a list of records.
	 *
	 * @param array $input
	 * @return array|NULL
	 */
	public function getList($input = []) {
		try {
			$list = [];
			if (isset($input['candidate_only'])) {
				$role  = Role::where('slug', 'candidate')->first();
				$query = $this->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.role_id', $role->id);
			} else {
				$query = $this;
			}
			$res = $query->orderBy('lname')->orderBy('fname')->get();
			foreach ($res as $row) {
				$list[] = [
					'id'   => $row->id,
					'name' => $row->lname . ', ' . $row->fname . ' (' . $row->email . ')'
				];
			}

			return $list;
		} catch (Exception $e) {
			Log::error($e);

			return NULL;
		}
	}

	/**
	 * Return a filtered list of records.
	 *
	 * @param array $input
	 * @return array
	 */
	public function getFilteredList($input = []) {
		try {
			// Init values
			$list           = [];
			$filtered_total = 0;

			// Build query
			$query = $this->select(
				'users.id',
				DB::raw('CONCAT(users.lname, ", ", users.fname) AS name'),
				'roles.name AS type',
				'statuses.status AS status'
			)->leftJoin('statuses', 'statuses.id', '=', 'users.status')
			->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
			->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
			->where('users.id', '<>', 1); // NOTE: exclude Super Admin
			if (isset($input['filter_status'])) {
				$query->where('users.status', $input['filter_status']);
			}
			if (isset($input['filter_type'])) {
				$query->where('role_user.role_id', $input['filter_type']);
			}
			if (isset($input['filter_name'])) {
				$query->where(function($q) use($input) {
					$q->orWhere('users.fname', 'like', '%' . $input['filter_name'] . '%');
					$q->orWhere('users.lname', 'like', '%' . $input['filter_name'] . '%');
				});
			}
			if (isset($input['order_by'])) {
				$query->orderBy($input['order_by'], (($input['order_dir'] == 'desc') ? 'desc' : 'asc'));
			} else {
				$query->orderBy('name', 'asc');
			}
			$res = $query->get();

			// Filtered total
			$filtered_total = $res->count();

			// Load all into array, then apply offset/limit
			$list = [];
			foreach ($res as $row) {
				$list[] = $row->toArray();
			}
			if (isset($input['offset']) and isset($input['limit'])) {
				$list = array_slice($list, $input['offset'], $input['limit']);
			}
		} catch (Exception $e) {
			log::error($e);
		}

		// Return
		return [
			'total'    => (string)$this->count(),
			'filtered' => (string)$filtered_total,
			'data'     => array_values($list)
		];
	}

	/**
	 * Hash passwords on save.
	 *
	 * @param string $password
	 */
	public function setPasswordAttribute($password) {
		$this->attributes['password'] = bcrypt($password);
	}

	/**
	 * Magic get.
	 *
	 * @param  string $column
	 * @return mixed
	 */
	public function __get($column) {
		switch ($column) {
			case 'name':
				return $this->fname . ' ' . $this->lname;
			break;
			case 'photo':
				$photo = UserData::where(['user_id' => $this->id, 'type' => UserData::PROFILE, 'key' => 'photo'])->pluck('value');
				if (!empty($photo)) {
					return config('app.url') . '/public/content/' . $photo;
				} else {
					return config('app.url') . '/public/img/profile-default.jpg';
				}
			break;
			case 'geography':
				return UserData::where(['user_id' => $this->id, 'type' => UserData::ACCOUNT])->get()->lists('value', 'key');
			break;
			case 'followers_count':
				return $this->followers->count();
			break;
			case 'favorite_count':
				return Follower::where(['candidate_id' => $this->id, 'favorite' => 1])->count();
			break;
			case 'party':
				$party_id = UserData::where(['user_id' => $this->id, 'type' => UserData::PROFILE, 'key' => 'party'])->pluck('value');
				return Party::getModel()->where('id', $party_id)->pluck('name');
			break;
			case 'notify_account_changes':
				return UserData::where(['user_id' => $this->id, 'type' => UserData::ACCOUNT, 'key' => 'notify_account_changes'])->pluck('value');
			break;
		}

		return parent::__get($column);
	}
}
