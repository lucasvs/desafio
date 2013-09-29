<?php
App::uses('AppController', 'Controller');
/**
 * Concursos Controller
 *
 * @property Concurso $Concurso
 */
class ConcursosController extends AppController {

/**
 * index method
 *
 * @return void
 */

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('parciais');

    }

	public function index() {
		$this->Concurso->recursive = 0;
		$this->set('concursos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Concurso->exists($id)) {
			throw new NotFoundException(__('Invalid concurso'));
		}
		$options = array('conditions' => array('Concurso.' . $this->Concurso->primaryKey => $id));
		$this->set('concurso', $this->Concurso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Concurso->create();
			if ($this->Concurso->save($this->request->data)) {
				$this->Session->setFlash(__('The concurso has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concurso could not be saved. Please, try again.'), 'flash/error');
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
		if (!$this->Concurso->exists($id)) {
			throw new NotFoundException(__('Invalid concurso'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Concurso->save($this->request->data)) {
				$this->Session->setFlash(__('The concurso has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concurso could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Concurso.' . $this->Concurso->primaryKey => $id));
			$this->request->data = $this->Concurso->find('first', $options);
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
		$this->Concurso->id = $id;
		if (!$this->Concurso->exists()) {
			throw new NotFoundException(__('Invalid concurso'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Concurso->delete()) {
			$this->Session->setFlash(__('Concurso deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Concurso was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

    public function parciais(){
        $concursos = $this->Concurso->find('all',array('conditions'=>array('fim >=' => date('Y-m-d H:i:s'))));
        $this->set(array('concursos'=>$concursos));
    }

}
