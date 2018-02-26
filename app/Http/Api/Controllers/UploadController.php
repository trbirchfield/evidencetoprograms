<?php namespace App\Http\Api\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Storage;
use File;

class UploadController extends Controller {
	/**
	 * Process upload.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function postIndex(Request $request) {
		try {
			// Make sure we have a file
			if (!$request->hasFile('file')) {
				throw new Exception('Missing upload.');
			}

			// Directory, path and upload details
			$file      = $request->file('file');
			$file_name = bin2hex(openssl_random_pseudo_bytes(20)) . '.' . $file->getClientOriginalExtension();

			// Save file
			if (Storage::put($file_name, File::get($file))) {
				// Update File Permissions
				chmod('./public/content/' . $file_name, 0755);
				$output['status']   = 200;
				$output['response'] = [
					'url'     => config('app.url') . '/public/content/' . $file_name,
					'name'    => $file_name,
					'size'    => Storage::size($file_name),
					'message' => 'Upload has been saved.'
				];
			} else {
				throw new Exception('There was a problem saving this upload.');
			}
		} catch (Exception $e) {
			// Some other error
			$output['status']   = 400;
			$output['response'] = ['message' => $e->getMessage()];
		}

		return response()->json($output['response'], $output['status']);
	}

	/**
	 * Delete upload.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function deleteIndex(Request $request) {
		$file = $request->input('file');
		if (Storage::delete($file)) {
			$output['status']   = 200;
			$output['response'] = ['message' => 'File deleted.'];
		} else {
			$output['status']   = 400;
			$output['response'] = ['message' => $e->getMessage()];
		}

		return response()->json($output['response'], $output['status']);
	}
}
