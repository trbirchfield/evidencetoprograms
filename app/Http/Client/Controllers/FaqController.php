<?php namespace App\Http\Client\Controllers;

class FaqController extends BaseController {
    /**
     * Home page.
     *
     * @return Response
     */
    public function getIndex() {
        $page_title       = 'Questions and answers about evidence-based programs';
        $meta_description = 'Review frequently asked questions regarding evidence-based programming and the toolkit, or submit a question to the experts using the online form ';
        $body_classes     = ['document'];

        return view('client::faq.index', compact('page_title', 'meta_description', 'body_classes'));
    }
}
