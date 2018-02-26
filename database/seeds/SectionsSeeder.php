<?php

use App\Models\Section;
use Illuminate\Database\Seeder;
use Symfony\Component\DomCrawler\Crawler;

class SectionsSeeder extends Seeder {
	/**
	 * Path to Section views
	 *
	 * @var string
	 */
	public $view_path = '/resources/client/views/section/';

	/**
	 * Seed the sections table.
	 *
	 * @return void
	 */
	public function run() {
		// Clear Data
		DB::table('sections')->truncate();

		// Rebuild Data
		$section_titles = require (dirname(__FILE__) . '/SeederData/section_titles.php');
		foreach ($section_titles as $section => $title) {
			// Render view for each section to get indexable content
			$data = [
				'section' => substr($section, 0, 1),
				'subsection' => substr($section, 0, -1)
			];
			$view = view('client::section.' . str_replace('.', '_', $section), $data)->renderSections();

			// Grab Indexed Content
			$crawler     = new Crawler($view['content']);
			$node_values = $crawler->filter('.search-index')->each(function (Crawler $node, $i) {
				return $node->text();
			});

			// Save content var to DB
			Section::create([
				'section'       => $section,
				'title'         => $title,
				'body'          => implode('', $node_values)
			]);
			$this->command->info('Seeded Section: ' . $section);
		}
	}
}
