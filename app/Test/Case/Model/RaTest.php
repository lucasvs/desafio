<?php
App::uses('Ra', 'Model');

/**
 * Ra Test Case
 *
 */
class RaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ra',
		'app.poll',
		'app.photo',
		'app.concurso'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ra = ClassRegistry::init('Ra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ra);

		parent::tearDown();
	}

}
