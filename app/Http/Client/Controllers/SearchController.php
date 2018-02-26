<?php namespace App\Http\Client\Controllers;

use App\Models\FAQ;
use App\Models\Section;
use Illuminate\Http\Request;

class SearchController extends BaseController {
    /**
     * Search Constructor
     *
     * @param Request $request
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Home page.
     *
     * @return Response
     */
    public function getIndex() {
        $page_title = 'Search';
        $body_classes = ['document'];
        $input = $this->request->all();
        if (!empty($input['search'])) {
            // Init Values
            $list   = [];
            $term   = strtolower(trim(strip_tags($input['search'])));
            $search = '%' . $term . '%';

            // Search Sections
            $sections  = Section::where('title', 'like', $search)->orWhere('body', 'like', $search)->orderBy('id')->get();
            foreach ($sections as $section) {
                if (substr_count(strtolower(trim($section->body)), $term) > 0) {
                    $section->excerpts = $this->getSummary($section->body, $term);
                }
            }

            // Prepare result list
            foreach ($sections as $row) {
                $row->section_slug = str_replace('.', '/', $row->section);
                $list[]            = $row->toArray();
            }

            return view('client::search.index', compact('page_title', 'body_classes', 'list'));
        }

        return view('client::search.index', compact('page_title', 'body_classes'));
    }

    /**
     * Highlight results within a summary.
     *
     * @param string $string
     * @param string $search_phrase
     * @return void
     */
    public function highlight($string, $search_phrase) {
        // Replace certain characters with spaces
        $search_phrase = str_replace(array('+', '-', '/'), ' ', $search_phrase);

        // Remove extra spaces
        $search_phrase = preg_replace('/\s+/', ' ', $search_phrase);

        // Remove anything that's non-alphanumeric or a space
        $search_phrase = preg_replace('/[^a-zA-Z0-9\s]/', '', $search_phrase);

        // Trim individual words
        $words  = explode(' ', trim($search_phrase));

        // Rebuild phrase
        $string = preg_replace('/\b(' . implode('|', $words) . ')\b/iu', '<span class="search-highlight">\\1</span>', $string);

        // Return
        return $string;
    }

    /*
     * Generate a summary of search result content.
     *
     * @param string $string
     * @param string $search_phrase
     * @return NULL
     */
    public function getSummary($string, $search_phrase) {
        // Prep string
        $string        = trim($string);
        $string        = html_entity_decode($string, ENT_COMPAT , 'UTF-8');
        $string        = strip_tags($string);
        $count         = 0;
        $summaries     = array();
        $string_pieces = (explode(PHP_EOL, $string));

        // Find positions of each search_phrase
        foreach ($string_pieces as $string_part) {
            if (strpos(strtolower($string_part), $search_phrase)) {
                // Setup Search
                $positions = array();
                $last_pos  = 0;

                // Find Matches with string_parts
                while (($last_pos = strpos(strtolower($string_part), $search_phrase, $last_pos)) !== FALSE and $count < 5) {
                    $positions[] = $last_pos;
                    $last_pos    = $last_pos + strlen($search_phrase);
                    $count++;
                }

                // Get summary, allow content on either side of matched word
                foreach ($positions as $position) {
                    $string_part_end    = strlen($string_part);
                    $ellip_left         = '';
                    $ellip_right        = '';
                    $summary_start      = max(0, $position - (350 / 2));
                    $summary_end        = min($string_part_end, $position + (350 / 2));
                    $summary            = substr($string_part, $summary_start, ($summary_end - $summary_start));
                    if ($summary_start > 0) {
                        $summary_start = strpos($summary, ' ');
                        $ellip_left    = '&hellip;';
                    }
                    if ($summary_end < $string_part_end) {
                        $summary_end = strrpos($summary, ' ');
                        $ellip_right = '&hellip;';
                    }
                    $summary     = trim(substr($summary, $summary_start, ($summary_end - $summary_start)));
                    $summary     = $ellip_left . $summary . $ellip_right;
                    $summaries[] = $this->highlight($summary, $search_phrase);
                }
            }
        }

        // Return
        return $summaries;
    }
}
