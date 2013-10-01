<?php
App::uses('AppController', 'Controller');
/**
 * Concursos Controller
 *
 * @property Concurso $Concurso
 */
class ConcursosController extends AppController
{

    /**
     * index method
     *
     * @return void
     */

    public $uses = array('Concurso');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('parciais','votar','vote');

    }

    public function index()
    {
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
    public function view($id = null)
    {
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
    public function add()
    {
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
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
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

    //parciais pagina inicial publica
    public function parciais()
    {
        $this->loadModel('Poll');

        $votos = $this->Poll->query('SELECT count(polls.id) as votos, concursos.id, concursos.titulo, photos.id,
            photos.nome,photos.thumbnail, photos.photo,photos.concurso_id, concursos.fim
            FROM `polls`,photos,concursos
            WHERE polls.photo_id = photos.id
            and photos.concurso_id = concursos.id
            and concursos.fim >= CURRENT_DATE
            group by photo_id, photos.concurso_id
            order by votos desc');

        $votos_photo = array();



        //decompondo array
        foreach ($votos as $key => $row) {

            if (!isset($votos_photo[$row['concursos']['id']]['total_votos']))
                $votos_photo[$row['concursos']['id']]['total_votos'] = 0;
            $votos_photo[$row['concursos']['id']]['total_votos'] += $row[0]['votos'];
            $votos_photo[$row['concursos']['id']]['titulo'] = $row['concursos']['titulo'];
            $votos_photo[$row['concursos']['id']]['id'] = $row['concursos']['id'];
            $votos_photo[$row['concursos']['id']]['fim'] = self::parseDate($row['concursos']['fim']);

            if( !isset( $votos_photo[$row['concursos']['id']]['photos'] ) )
                $votos_photo[$row['concursos']['id']]['photos'] = array();

            if (count($votos_photo[$row['concursos']['id']]['photos']) < 3) {
                $votos_photo[$row['concursos']['id']]['photos'][$row['photos']['id']] = array(
                    'thumbnail' => $row['photos']['thumbnail'],
                    'id' => $row['photos']['id'],
                    'votos' => $row[0]['votos'],
                    'nome' => $row['photos']['nome'],
                    'photo' => $row['photos']['photo']
                    );
            }
        }





        //transformando contagem em porcentagem
        foreach ($votos_photo as $key => $row) {
            $total = $row['total_votos'];
            foreach ($row['photos'] as $key1 => $row1) {
                if($total != 0)
                    $votos_photo[$key]['photos'][$key1]['votos_porc'] = round(($row1['votos'] / $total) * 100, 1);
                else
                    $votos_photo[$key]['photos'][$key1]['votos_porc'] = 0;

            }
        }

        //pegar votos sem votos
        $agora = date('Y-m-d H:i:m');
        $date = date('Y-m-d');
        $concursos = $this->Concurso->find('all',array(
            'conditions' => array(
                'and' => array(
                    array('Concurso.inicio <= ' => $date,
                      'Concurso.fim >= ' => $date
                      ),     
                    ))));

        $this->loadModel('Photo');
        $photos = $this->Photo->find('all',array());

        foreach ($concursos as $concurso) {

            $votos_photo[$concurso['Concurso']['id']]['titulo'] = $concurso['Concurso']['titulo'];            
            $votos_photo[$concurso['Concurso']['id']]['id'] = $concurso['Concurso']['id'];
            $votos_photo[$concurso['Concurso']['id']]['fim'] = $concurso['Concurso']['fim'];
           // $votos_photo[$concurso['Concurso']['id']]['photos'] = array();
            foreach($photos as $photo){
                if(!isset($votos_photo[$concurso['Concurso']['id']]['photos'][$photo['Photo']['id']])){
                   $votos_photo[$concurso['Concurso']['id']]['photos'][$photo['Photo']['id']] =
                   array(
                    'thumbnail' => $photo['Photo']['thumbnail'],
                    'votos_porc' => 0,
                    'id' => $photo['Photo']['id'],
                    'votos' => 0,
                    'nome' => $photo['Photo']['nome'],
                    'photo' => $photo['Photo']['photo']
                    );
                   $votos_photo[$concurso['Concurso']['id']]['total_votos'] = 0;
               }
           }
       }




       $this->set(array('concursos' => $votos_photo));


   }


   public function votar($id = null){
    $ids = explode('-',$id);
    $id = $ids[1];
    $id_concurso = $ids[0];
   
    if ($this->request->is('post') || $this->request->is('put')) {
      $this->loadModel('Poll');
      $this->loadModel('Ra');
      $ras = $this->Ra->find('first',array('conditions' => array('Ra.ra' => $this->request->data['Poll']['ra'])));
      $count = $this->Poll->find('count',
        array('condition' => array('Poll.concurso_id ' => $id_concurso,'Poll.ra_id' => $ras['Ra']['id'])));
      $this->request->data['Poll']['ra'] = null;
      $this->request->data['Poll']['concurso_id'] = $id_concurso;
      $this->request->data['Poll']['photo_id'] = $id;
      $this->request->data['Poll']['ra_id'] = $ras['Ra']['id'];
      if($count ==0) {
      if ($this->Poll->save($this->request->data)) {
        $this->Session->setFlash(__('Voto realizado com sucesso'), 'flash/success');
        $this->redirect(array('action' => 'index'));
    } else {
        $this->Session->setFlash(__('error'), 'flash/error');
          $this->redirect(array('action' => 'index'));
    }
}else{
   $this->Session->setFlash(__('voce já possui votos nesse concurso'), 'flash/error');
          $this->redirect(array('action' => 'index'));
}
} else {
    $options = array('conditions' => array('Concurso.' . $this->Concurso->primaryKey => $id));
    $this->request->data = $this->Concurso->find('first', $options);
}

}

    //parciais pagina inicial publica
    public function vote($id = null)
    {
        $this->loadModel('Poll');

        $votos = $this->Poll->query('SELECT count(polls.id) as votos, concursos.id, concursos.titulo, photos.id,
            photos.nome,photos.thumbnail, photos.photo, concursos.fim
            FROM `polls`,photos,concursos
            WHERE polls.photo_id = photos.id
            and photos.concurso_id = '.$id.'
            and concursos.fim >= CURRENT_DATE
            group by photo_id
            order by votos desc');

        $votos_photo = array();



        //decompondo array
        foreach ($votos as $key => $row) {

            if (!isset($votos_photo[$row['concursos']['id']]['total_votos']))
                $votos_photo[$row['concursos']['id']]['total_votos'] = 0;
            $votos_photo[$row['concursos']['id']]['total_votos'] += $row[0]['votos'];
            $votos_photo[$row['concursos']['id']]['titulo'] = $row['concursos']['titulo'];
            $votos_photo[$row['concursos']['id']]['id'] = $row['concursos']['id'];
            $votos_photo[$row['concursos']['id']]['fim'] = self::parseDate($row['concursos']['fim']);

            if( !isset( $votos_photo[$row['concursos']['id']]['photos'] ) )
                $votos_photo[$row['concursos']['id']]['photos'] = array();

            if (count($votos_photo[$row['concursos']['id']]['photos']) < 3) {
                $votos_photo[$row['concursos']['id']]['photos'][$row['photos']['id']] = array(
                    'thumbnail' => $row['photos']['thumbnail'],
                    'id' => $row['photos']['id'],
                    'votos' => $row[0]['votos'],
                    'nome' => $row['photos']['nome'],
                    'photo' => $row['photos']['photo']
                    );
            }
        }





        //transformando contagem em porcentagem
        foreach ($votos_photo as $key => $row) {
            $total = $row['total_votos'];
            foreach ($row['photos'] as $key1 => $row1) {
                if($total != 0)
                    $votos_photo[$key]['photos'][$key1]['votos_porc'] = round(($row1['votos'] / $total) * 100, 1);
                else
                    $votos_photo[$key]['photos'][$key1]['votos_porc'] = 0;

            }
        }

        //pegar fotos sem votos
        $agora = date('Y-m-d H:i:m');
        $date = date('Y-m-d');
        $concursos = $this->Concurso->find('all',array(
            'conditions' => array(
                'and' => array(
                    array('Concurso.inicio <= ' => $date,
                      'Concurso.fim >= ' => $date
                      ),     
                    'Concurso.id' => $id))));

        $this->loadModel('Photo');
        $photos = $this->Photo->find('all',array());

        foreach ($concursos as $concurso) {

            $votos_photo[$concurso['Concurso']['id']]['titulo'] = $concurso['Concurso']['titulo'];            
            $votos_photo[$concurso['Concurso']['id']]['id'] = $concurso['Concurso']['id'];
            $votos_photo[$concurso['Concurso']['id']]['fim'] = $concurso['Concurso']['fim'];
           // $votos_photo[$concurso['Concurso']['id']]['photos'] = array();
            foreach($photos as $photo){
                if(!isset($votos_photo[$concurso['Concurso']['id']]['photos'][$photo['Photo']['id']])){
                   $votos_photo[$concurso['Concurso']['id']]['photos'][$photo['Photo']['id']] =
                   array(
                    'thumbnail' => $photo['Photo']['thumbnail'],
                    'votos_porc' => 0,
                    'id' => $photo['Photo']['id'],
                    'votos' => 0,
                    'nome' => $photo['Photo']['nome'],
                    'photo' => $photo['Photo']['photo']
                    );
                   $votos_photo[$concurso['Concurso']['id']]['total_votos'] = 0;
               }
           }
       }




       $this->set(array('concursos' => $votos_photo));


   }

}
