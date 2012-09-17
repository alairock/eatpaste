<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'pastes', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'pastes', 'action' => 'index')
		)
	);

	public function beforeFilter() {
		$this->set('auth', $this->Auth->user());
		if (!file_exists(APP . 'Plugin' . DS . 'Install' . DS . 'Controller' . DS . 'InstallAppController.php')) {
			$this->loadModel('Option');
			$Option = $this->Option->find('first', array('name' => 'version'));
			if ( $Option['Option']['value'] != Configure::read('version')) {
				$this->Session->setFlash('Database Requires Upgrade!');
			}
		}
		if (file_exists(APP . 'Plugin' . DS . 'Install' . DS . 'Controller' . DS . 'InstallAppController.php') AND $this->name != 'Installers' ) {
			$this->redirect(array('plugin' => 'install', 'controller' => 'Installers', 'action' => 'index', 'admin' => false));
		}
	}
}
