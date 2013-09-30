<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 */
class PhotosController extends AppController {

/**
 * index method
 *
 * @return void
 */
public function index() {
	 if(AuthComponent::user('role') != 'admin')
    {
      		$this->Session->setFlash(__(''), 'flash/error');
		$this->redirect(array('controller' => 'pages','action' => 'index'));
    }
	$this->Photo->recursive = 0;
	$this->set('photos', $this->paginate());
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	 if(AuthComponent::user('role') != 'admin')
    {
      		$this->Session->setFlash(__(''), 'flash/error');
		$this->redirect(array('controller' => 'pages','action' => 'index'));
    }
	if (!$this->Photo->exists($id)) {
		throw new NotFoundException(__('Invalid photo'));
	}
	$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
	$this->set('photo', $this->Photo->find('first', $options));
}

/**
 * add method
 *
 * @return void
 */
public function add($id = null) {

	$this->loadModel('Concurso');
	if (!$this->Concurso->exists($id)) {
		$this->Session->setFlash(__('Este concurso não existe'), 'flash/error');
		$this->redirect(array('controller' => 'pages','action' => 'index'));
	}

	$count = $this->Photo->find('count', array(
		'conditions' => array('Photo.user_id' => $this->Session->read('Auth.User.id'),'Photo.concurso_id' => $id)
		));
	if($count >0) {
		$this->Session->setFlash(__('Este usuario já possui uma foto cadastrada nesse concurso'), 'flash/error');
		$this->redirect(array('controller' => 'pages','action' => 'index'));	
	}

	if(!empty($_FILES) && $id != null)
	{
		$errors = array();

			// Organiza o array de multiple upload
		$file = $this->data['Photo']['photo'];

			// Abre cada array de arquivos

				// Caso o arquivo seja válido
		if( $file['error'] == 0 )
		{
					// Faz o upload da foto no tamanho original
			if( $foto = $this->Arquivo->upload($file,'fotos/') )
			{
						// Verifica o tamanho mínimo para criar o thumbnail
				if( !$this->Arquivo->validaTamanho(
					$foto['link'],
							Configure::read('Gerenciador.photo_thumbnail_size.0'), // Width
							Configure::read('Gerenciador.photo_thumbnail_size.1'), // Height
							'min'						
							) )
				{
					array_push($errors,$foto['nome']);
				}
				else
				{							
							// Cria o thumbnail
					$thumbnail = $this->Arquivo->generateThumbnail(
								$file, // File
								'fotos/', // Pasta em que será salvo
								Configure::read('Gerenciador.photo_thumbnail_size.0'), // Width
								Configure::read('Gerenciador.photo_thumbnail_size.1'), // Height
								'crop', // Crop
								$foto['nome_no_ext']); // Nome do arquivo sem extensão

							// Salva os dados no banco
					$data = array(
						'Photo' => array(
							'nome' => $foto['nome'],
							'photo' => $foto['link'],
							'thumbnail' => $thumbnail['link'],
							'concurso_id' => $id,
							'user_id' => $this->Session->read('Auth.User.id'),
							)
						);
					$this->Photo->create();
					$this->Photo->save($data);
					$this->Session->setFlash(__('Foto cadastrada com sucesso'), 'flash/success');
					$this->redirect(array('controller' => 'pages','action' => 'index'));

				}


			}
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
	 if(AuthComponent::user('role') != 'admin')
    {
      		$this->Session->setFlash(__(''), 'flash/error');
		$this->redirect(array('controller' => 'pages','action' => 'index'));
    }
	if (!$this->Photo->exists($id)) {
		throw new NotFoundException(__('Invalid photo'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->Photo->save($this->request->data)) {
			$this->Session->setFlash(__('The photo has been saved'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The photo could not be saved. Please, try again.'), 'flash/error');
		}
	} else {
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->request->data = $this->Photo->find('first', $options);
	}
	$concursos = $this->Photo->Concurso->find('list');
	$this->set(compact('concursos'));
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
	 if(AuthComponent::user('role') != 'admin')
    {
      		$this->Session->setFlash(__(''), 'flash/error');
		$this->redirect(array('controller' => 'pages','action' => 'index'));
    }
		$this->Photo->id = $id;

		if (!$this->Photo->exists()) 
		{
			throw new NotFoundException('Foto inválida');
		}

		$foto = $this->Photo->read(null);

		unlink(WWW_ROOT.$foto['Photo']['photo']);
		unlink(WWW_ROOT.$foto['Photo']['thumbnail']);

		$this->Photo->delete();

		$this->Session->setFlash('Foto removida com sucesso','flash_success');
		$this->redirect(array('action' => 'index'));
}
}
