<?php namespace App\Http\Client\Controllers;

class ProgramsController extends BaseController {
    /**
     * Home page.
     *
     * @return Response
     */
    public function getIndex() {
        $page_title       = 'Evidence-based programming videos';
        $meta_description = 'Watch video presentations from experts in the area of evidence-based programming and learn how to apply the toolkit in your own organization';
        $body_classes     = ['document'];

        return view('client::programs.index', compact('page_title', 'meta_description', 'body_classes'));
    }
}
