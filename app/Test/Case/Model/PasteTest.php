<?php
App::uses('Paste', 'Model');

/**
 * Paste Test Case
 *
 */
class PasteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paste'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Paste = ClassRegistry::init('Paste');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Paste);

		parent::tearDown();
	}

}
