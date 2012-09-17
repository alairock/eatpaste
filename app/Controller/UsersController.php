<?php
// app/Controller/UsersController.php
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('logout');
	}

	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
		$updatesRequired = $this->__updatesRequired();
		if (!empty($updatesRequired)) {
			$this->set('updateRequired', true);
			$this->set('updateVersion', $updatesRequired[0]);
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
	}

	public function admin_change_password($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

/**
 * __updatesRequired method
 *
 * @return void
 */
	private function __updatesRequired() {
		App::uses('HttpSocket', 'Network/Http');
		$this->Http = new HttpSocket();
		$results = $this->Http->get('https://api.github.com/repos/alairock/eatpaste/tags');
		$results = json_decode($results);
		$versions = array();
		foreach ($results as $resultsValue) {
			$tags = get_object_vars($resultsValue);
			$tag = str_replace('V', '', $tags['name']);
			$liveV = Configure::read('version');
			if( version_compare($tag, $liveV, '>') ) {
				array_push($versions, $tag);
			}
		}
		return $versions;
	}

/**
 * __checkDbVersionIntegrity method
 *
 * @return void
 */
	private function __checkDbVersionIntegrity() {
		if (!file_exists(APP . 'Plugin' . DS . 'Install' . DS . 'Controller' . DS . 'InstallAppController.php')) {
			$this->loadModel('Option');
			$Option = $this->Option->find('first', array('name' => 'version'));
			if ( $Option['Option']['value'] != Configure::read('version')) {
				return false;
			}
		}
		return true;
	}

}