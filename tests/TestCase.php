<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {
	/**
	 * Set flag if db is needed for test.
	 *
	 * @var bool
	 */
	public $use_db = FALSE;

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication(){
		$app = require __DIR__ . '/../bootstrap/app.php';
		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	/**
	 * Setup the test environment.
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		// Log emails instead of sending
		Mail::pretend(TRUE);

		// Only prep DB if required
		if ($this->use_db) {
			$this->prepDb();
		}
	}

	/**
	 * Tear down the test environment.
	 *
	 * @return void
	 */
	public function tearDown() {
		Mockery::close();
	}

	/**
	 * Prepare database for tests that need it.
	 *
	 * @return void
	 */
	private function prepDb() {
		Artisan::call('migrate');
		Artisan::call('db:seed');
	}

	/**
	 * Helper method for generating mocks.
	 *
	 * @param string $class
	 * @return Mockery\Mock
	 */
	public function mock($class) {
		$mock = Mockery::mock($class);
		$this->app->instance($class, $mock);
		return $mock;
	}
}
