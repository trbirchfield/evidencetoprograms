<?php

class ApiWidgetsTest extends TestCase {
	/**
	 * Setup tests.
	 *
	 * @return void
	 */
	public function setUp() {
		$this->use_db = TRUE;
		parent::setUp();
	}

	/**
	 * Test list all.
	 *
	 * @return void
	 */
	public function testListAll() {
		$res     = $this->call('GET', 'api/widgets');
		$content = json_decode($res->getContent(), TRUE);

		$this->assertResponseOk();
		$this->assertInternalType('array', $content);
		$this->assertArrayHasKey('total', $content);
		$this->assertArrayHasKey('filtered', $content);
		$this->assertArrayHasKey('data', $content);
		$this->assertEquals($content['total'], 10);
		$this->assertEquals(count($content['data']), 10);
	}

	/**
	 * Test add/update item.
	 *
	 * @return void
	 */
	public function testAddUpdate() {
		$res = $this->call('POST', 'api/widgets', ['title' => 'Widget Four', 'status' => 1]);
		$content = json_decode($res->getContent(), TRUE);

		$this->assertResponseOk();
		$this->assertInternalType('array', $content);
	}

	/**
	 * Test deleting an item.
	 *
	 * @return void
	 */
	public function testDelete() {
		$res = $this->call('DELETE', 'api/widgets/index/1');

		$this->assertResponseOk();
	}

	/**
	 * Test retrieving a select list.
	 *
	 * @return void
	 */
	public function testSelectList() {
		$res     = $this->call('GET', 'api/widgets/select-list/id/title');
		$content = json_decode($res->getContent(), TRUE);

		$this->assertResponseOk();
		$this->assertInternalType('array', $content);
		$this->assertEquals(count($content), 10);
	}

	/**
	 * Test retrieving a list of available statuses.
	 *
	 * @return void
	 */
	public function testStatusList() {
		$res     = $this->call('GET', 'api/widgets/statuses');
		$content = json_decode($res->getContent(), TRUE);

		$this->assertResponseOk();
		$this->assertInternalType('array', $content);
		$this->assertEquals(count($content), 2);
		$this->assertEquals($content[1], 'Active');
		$this->assertEquals($content[2], 'Inactive');
	}

	/**
	 * Test setting the status of an item.
	 *
	 * @return void
	 */
	public function testSetStatus() {
		$res     = $this->call('POST', 'api/widgets/set-status', ['id' => 1, 'value' => 2]);
		$content = json_decode($res->getContent(), TRUE);

		$this->assertResponseOk();
		$this->assertInternalType('array', $content);
		$this->assertArrayHasKey('message', $content);
		$this->assertEquals($content['message'], 'Widget has been updated.');
	}
}
