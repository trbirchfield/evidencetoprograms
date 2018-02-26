<?php namespace App\Console\Commands;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Follower;
use App\Models\Status;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Console\Command;
use Log;

class ClearClosedAccounts extends Command {
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'clear-closed-accounts';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Remove closed accounts older than 60 days';

	/**
	 * Execute the console command.
	 *
	 * @param  User $model
	 * @return mixed
	 */
	public function handle(User $model) {
		try {
			// Check for old closed accounts
			$res = $model->select('id')
				->where('status', Status::INACTIVE)
				->where('updated_at', '<', DB::raw('DATE_SUB(NOW(), INTERVAL 60 DAY)'))
				->get();
			foreach ($res as $row) {
				// Clear out old data
				Announcement::where('user_id', $row->id)->delete();
				Event::where('user_id', $row->id)->delete();
				Follower::where('user_id', $row->id)->delete();
				$model->where('id', $row->id)->forceDelete();
			}
		} catch (Exception $e) {
			log::error($e);
		}
	}
}
