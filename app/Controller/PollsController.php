<?php
App::uses('AppController', 'Controller');
/**
 * Polls Controller
 *
 * @property Poll $Poll
 */
class PollsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Poll->exists($id)) {
			throw new NotFoundException(__('Invalid poll'));
		}
		$options = array('conditions' => array('Poll.' . $this->Poll->primaryKey => $id));
		$this->set('poll', $this->Poll->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Poll->create();
			if ($this->Poll->save($this->request->data)) {
				$this->Session->setFlash(__('The poll has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$photos = $this->Poll->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Poll->exists($id)) {
			throw new NotFoundException(__('Invalid poll'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Poll->save($this->request->data)) {
				$this->Session->setFlash(__('The poll has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Poll.' . $this->Poll->primaryKey => $id));
			$this->request->data = $this->Poll->find('first', $options);
		}
		$photos = $this->Poll->Photo->find('list');
		$this->set(compact('photos'));
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
		$this->Poll->id = $id;
		if (!$this->Poll->exists()) {
			throw new NotFoundException(__('Invalid poll'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Poll->delete()) {
			$this->Session->setFlash(__('Poll deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Poll was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
