<?php
App::uses('AppController', 'Controller');
/**
 * Pastes Controller
 *
 * @property Paste $Paste
 */
class InstallersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		Router::connect('/', array('controller' => 'pastes', 'action' => 'index'));
	}
}