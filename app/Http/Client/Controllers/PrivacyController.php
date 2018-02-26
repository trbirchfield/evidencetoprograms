<?php namespace App\Http\Client\Controllers;

class PrivacyController extends BaseController {
    /**
     * Home page.
     *
     * @return Response
     */
    public function getIndex() {
        $page_title       = 'Privacy Policy';
        $meta_description = 'Review the privacy policy for the Evidence-based Programming for Seniors';
        $body_classes     = ['document'];

        return view('client::privacy.index', compact('page_title', 'meta_description', 'body_classes'));
    }
}
