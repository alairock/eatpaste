<?php
App::uses('AppController', 'Controller');
App::uses('CakeSchema', 'Model');

/**
 * Installers Controller
 *
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
		//index
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
		$file = "<?php class DATABASE_CONFIG { public \$default = array( 'datasource' => 'Database/Mysql', 'persistent' => false, 'host' => '$host', 'login' => '$login', 'password' => '$password', 'database' => '$databasename', 'prefix' => '$prefix', ); } ";
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