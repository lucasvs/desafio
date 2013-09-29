<?php
App::uses('Concurso', 'Model');

/**
 * Concurso Test Case
 *
 */
class ConcursoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.concurso',
		'app.photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Concurso = ClassRegistry::init('Concurso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Concurso);

		parent::tearDown();
	}

}
