<?php
App::uses('AppController', 'Controller');



/**
 * Installers Controller
 *
 */
class InstallersController extends InstallAppController {

	

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
		if (!file_exists(APP . 'Config' . DS . 'install.php')) {
			$this->Session->setFlash('You dont need to be in the installer! Your application is already installed.');
			$this->redirect(array('controller' => 'pastes', 'action' => 'index'));
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//index
	}

/**
 * database method
 *
 * @return void
 */
	public function database() {
		 //database
	}

/**
 * users method
 *
 * @return void
 */
	public function users() {
		$databasePost = $this->request->data;
		if ($this->__testConnection($databasePost['Installer']['hostname'], $databasePost['Installer']['dbuser'], $databasePost['Installer']['dbpass'], $databasePost['Installer']['dbname'])) {
			$this->Session->setFlash('Connection is Successful.');
			$this->__generateDatabaseConfigFile($databasePost['Installer']['hostname'], $databasePost['Installer']['dbuser'], $databasePost['Installer']['dbpass'], $databasePost['Installer']['dbname'], $databasePost['Installer']['dbprefix']);
		} else {
			$this->Session->setFlash('Cannot connect to database using those credentials. Try again');
			$this->redirect($this->referer());
		}
		$this->set('database', $databasePost);
	}

/**
 * complete me$complete = $this->request->data;
 * @return void
 */
	public function complete() {
		$complete = $this->request->data;
		pr($this->Installer->importData()); exit;
		if ( !$this->Installer->importSchema() ) {
			pr('failed to save data');
		} 
		if ( !$this->Installer->importData() ) {
			pr('failed to import data');
		}
		 exit;
		$this->set('complete', $complete);
	}

/**
 * __testConnection method
 *
 * @return void
 */
	private function __testConnection($dbhost, $dbuser, $dbpass, $dbname) {
		$mysqli = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($mysqli->connect_errno) {
			return false;
		} else {
			return true;
		}
	}

/**
 * __generateDatabaseConfigFile method
 *
 * @return void
 */
	private function __generateDatabaseConfigFile($host, $login, $password, $databasename, $prefix) {
		$file = "<?php class DATABASE_CONFIG {\npublic \$default = array( \n'datasource' => 'Database/Mysql', \n'persistent' => false, \n'host' => '$host', \n'login' => '$login', \n'password' => '$password', \n'database' => '$databasename', \n'prefix' => '$prefix', \n); \n} ";
		file_put_contents(APP . 'Config' . DS . 'database.php', $file);
		return false;
	}

}