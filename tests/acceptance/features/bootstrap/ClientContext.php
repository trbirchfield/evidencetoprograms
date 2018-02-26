<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Hook\Scope\AfterFeatureScope;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit_Framework_Assert as Assertions;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class ClientContext extends MinkContext implements Context, SnippetAcceptingContext {
	/**
	 * Initializes context.
	 *
	 * Every scenario gets its own context instance.
	 * You can also pass arbitrary arguments to the
	 * context constructor through behat.yml.
	 */
	public function __construct() {

	}

	/**
	 * @BeforeScenario
	 */
	public static function setUp() {
		Artisan::call('migrate');
		Artisan::call('db:seed');
	}

	/**
	 * @AfterScenario
	 */
	public static function tearDown() {

	}

	/**
	 * @Then I can do something with Laravel
	 */
	public function iCanDoSomethingWithLaravel() {
		Assertions::assertEquals('.env.testing', app()->environmentFile());
		Assertions::assertEquals('testing', env('APP_ENV'));
		Assertions::assertEquals('sqlite_memory', env('DB_CONNECTION'));
		Assertions::assertTrue(config('app.debug'));
	}
}
