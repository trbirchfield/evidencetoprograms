<?php

class ExampleTest extends TestCase {
	/**
	 * Example of basic asserts.
	 *
	 * @return void
	 */
	public function testExampleAsserts() {
		$foo    = 'foo';
		$bar    = 'bar';
		$baz    = NULL;
		$values = ['foo', 'bar', 'baz'];
		$this->assertTrue($foo != $bar);
		$this->assertFalse($foo == $bar);
		$this->assertEquals($foo, 'foo');
		$this->assertEquals($baz, 0);
		$this->assertSame($baz, NULL);
		$this->assertContains('foo', $values);
		$this->assertNotContains('qux', $values);

		$family = [
			'parents'  => 'Joe',
			'children' => ['Timmy', 'Suzy']
		];
		$this->assertArrayHasKey('parents', $family);
		$this->assertInternalType('array', $family['children']);

		$widget = $this->app->make('App\Models\Widget');
		$this->assertInstanceOf('Eloquent', $widget);
	}

	/**
	 * Example of calling a route.
	 *
	 * @return void
	 */
	public function testBasicExample() {
		$res = $this->call('GET', '/');

		$this->assertEquals(200, $res->getStatusCode());
	}
}
