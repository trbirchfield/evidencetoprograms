<?php namespace App\Http\Client\Controllers\Test;

class RepoController extends BaseController {
	public function getIndex(\App\Repositories\WidgetRepository $repo) {

		// dd($repo->all());

		// dd($repo->find(1));

		// dd($repo->findBy('title', 'foobar'));

		// $res = $repo->save([
		// 	'title'  => 'delete me',
		// 	'status' => \App\Models\Status::INACTIVE
		// ]);
		// dd($res);

		// $res = $repo->delete(14);
		// dd($res);

		// dd($repo->selectList('id', 'title'));

		// dd($repo->filteredList([
		// 	'filter_status' => 1
		// ]));

		dd($repo->statusList());

		dd(__FILE__);

	}
}
