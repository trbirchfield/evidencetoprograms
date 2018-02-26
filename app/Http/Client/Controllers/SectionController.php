<?php namespace App\Http\Client\Controllers;

use App\Models\Section;

class SectionController extends BaseController {
    /**
     * Section pages.
     *
     * @return Response
     */
    public function getIndex($section = '1', $subsection = '0') {
        if ($section < 4) {
            $page_title = 'Select an Evidence Based Program';
        } else {
            $page_title = 'Implement an Evidence Based Program';
        }
        $body_classes = ['document'];

        if (view()->exists('client::section.' . $section . '_' . $subsection)) {
            $record           = Section::where('section', '=', $section . '.' . $subsection)->first();
            $headline         = $record->title;
            $meta_description = $record->meta_description;
            $meta_keywords    = $record->meta_keywords;

            return view('client::section.' . $section . '_' . $subsection, compact('page_title', 'meta_description', 'meta_keywords', 'body_classes', 'section', 'subsection', 'headline'));
        } else {
            return redirect()->route('home');
            // Uncomment if we plan on having custom 404 page
            // abort(404);
        }
    }
}
