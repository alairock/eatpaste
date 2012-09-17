<?php
App::uses('HttpSocket', 'Network/Http');
App::uses('AppController', 'Controller');
/**
 * Pastes Controller
 *
 * @property Paste $Paste
 */
class PastesController extends AppController {

	public $helpers = array('Form', 'Html', 'Js', 'Time', 'TrimThree');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paste->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
		);
		$pasteCount = $this->paginate();
			if (empty($pasteCount)) {
				$this->Session->setFlash('No Pastes to display, add a new post prior to going to the Pastes page.');
				$this->redirect(array('controller' => 'pastes', 'action' => 'add'));
			}
		$this->set('pastes', $pasteCount);

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Paste->id = $id;
		if (!$this->Paste->exists()) {
			throw new NotFoundException(__('Invalid paste'));
		}
		$pasteData = $this->Paste->read(null, $id);
		if($pasteData['Paste']['short_url'] == null) {
			$shortArray = $this->shorten( $_SERVER['SERVER_NAME'] . $this->base . '/pastes/view/' . $pasteData['Paste']['id'] );
			$pasteData['Paste']['short_url'] = $shortArray['id'];
			$this->Paste->save($pasteData);
		}
		$this->set('paste', $pasteData);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Paste->create();
			if ($this->Paste->save($this->request->data)) {
				$this->Session->setFlash(__('The paste has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paste could not be saved. Please, try again.'));
			}
		}
		$this->set('langs', Configure::read('languages'));
	}

/**
 * Shorten Method
 **/
	public function shorten($url) {
		$socket = new HttpSocket();
		$shortenerUrl = 'https://www.googleapis.com/urlshortener/v1/url';
		$longUrl = $url;
		$results = $socket->post($shortenerUrl, 
			json_encode(array('longUrl' => $longUrl)),
			array('header' => array('Content-Type' => 'application/json'))
		);
		return get_object_vars(json_decode($results));

	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Paste->id = $id;
		if (!$this->Paste->exists()) {
			throw new NotFoundException(__('Invalid paste'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Paste->save($this->request->data)) {
				$this->Session->setFlash(__('The paste has been saved'));
				$this->redirect(array('action' => 'index', 'admin' => false));
			} else {
				$this->Session->setFlash(__('The paste could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Paste->read(null, $id);
		}
		$this->set('langs', Configure::read('languages'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Paste->id = $id;
		if (!$this->Paste->exists()) {
			throw new NotFoundException(__('Invalid paste'));
		}
		if ($this->Paste->delete()) {
			$this->Session->setFlash(__('Paste deleted'));
			$this->redirect(array('action' => 'index', 'admin' => false));
		}
		$this->Session->setFlash(__('Paste was not deleted'));
		$this->redirect(array('action' => 'index', 'admin' => false));
	}
}
