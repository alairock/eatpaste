<?php
App::uses('AppController', 'Controller');
App::uses('CakeSchema', 'Model');

/**
 * Installers Controller
 *
 */
class InstallersController extends AppController {

	public $uses = false;

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
		//index
	}

/**
 * database method
 *
 * @return void
 */
	public function database() {
		 //stuff
	}

/**
 * users method
 *
 * @return void
 */
	public function users() {
		$databasePost = $this->request->data;
		if ($this->__testConnection($databasePost['Installer']['hostname'], $databasePost['Installer']['dbuser'], $databasePost['Installer']['dbpass'], $databasePost['Installer']['dbname'])) {
			$this->Session->setFlash('Connection is Sccessful.');
			$this->__generateDatabaseConfigFile($databasePost['Installer']['hostname'], $databasePost['Installer']['dbuser'], $databasePost['Installer']['dbpass'], $databasePost['Installer']['dbname'], $databasePost['Installer']['dbprefix']);
		} else {
			$this->Session->setFlash('Cannot connect to database using those credentials. Try again');
			$this->redirect($this->referer());
		}
		$this->set('database', $databasePost);
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
 * removeInstallers method
 * Sets autoRender to false. No view required.
 *
 * @return void
 */
	private function __removeInstallers() {
		$this->autoRender = false;
	}

/**
 * __generateDatabaseConfigFile method
 *
 * @return void
 */
	private function __generateDatabaseConfigFile($host, $login, $password, $databasename, $prefix) {
		$file = "<?php class DATABASE_CONFIG {\npublic $install = 1; \npublic \$default = array( \n'datasource' => 'Database/Mysql', \n'persistent' => false, \n'host' => '$host', \n'login' => '$login', \n'password' => '$password', \n'database' => '$databasename', \n'prefix' => '$prefix', \n); \n} ";
		file_put_contents(APP . 'Config' . DS . 'database.php', $file);
		return false;
	}

/**
 * importSchema method
 *
 * @return void
 */
	private function __importSchema() {
		$this->Schema = new CakeSchema();
		$Schema = $this->Schema->load();
		$db = ConnectionManager::getDataSource($this->Schema->connection);
		$contents = "\n\n" . $db->dropSchema($Schema) . "\n\n" . $db->createSchema($Schema);
		$this->Installer->query($contents);
	}
}