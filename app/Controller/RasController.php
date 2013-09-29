<?php
App::uses('AppController', 'Controller');
/**
 * Ras Controller
 *
 * @property Ra $Ra
 */
class RasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ra->recursive = 0;
		$this->set('ras', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ra->exists($id)) {
			throw new NotFoundException(__('Invalid ra'));
		}
		$options = array('conditions' => array('Ra.' . $this->Ra->primaryKey => $id));
		$this->set('ra', $this->Ra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ra->create();
			if ($this->Ra->save($this->request->data)) {
				$this->Session->setFlash(__('The ra has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ra could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ra->exists($id)) {
			throw new NotFoundException(__('Invalid ra'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ra->save($this->request->data)) {
				$this->Session->setFlash(__('The ra has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ra could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Ra.' . $this->Ra->primaryKey => $id));
			$this->request->data = $this->Ra->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ra->id = $id;
		if (!$this->Ra->exists()) {
			throw new NotFoundException(__('Invalid ra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ra->delete()) {
			$this->Session->setFlash(__('Ra deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ra was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
