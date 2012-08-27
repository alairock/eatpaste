<?php
App::uses('AppController', 'Controller');
/**
 * Pastes Controller
 *
 * @property Paste $Paste
 */
class InstallersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//
	}

/**
 * removeInstallers method
 * Sets autoRender to false. No view required.
 *
 * @return void
 */
	public function removeInstallers() {
		$this->autoRender = false;
		//$this->setInstall('0');
	}

/**
 * setInstall method
 * Sets autoRender to false. No view required.
 *
 * @return void
 */
	public function setInstall($boolean = 0) {
		$this->autoRender = false;
		$CoreFile = file_get_contents(APP . 'Config' . DS . 'core.php');
		$CoreFile = str_replace("'requireInstall', 1)", "'requireInstall', 0)", $CoreFile);
		file_put_contents(APP . 'Config' . DS . 'core.php', $CoreFile);
	}
}