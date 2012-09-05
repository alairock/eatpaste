<?php
App::uses('AppController', 'Controller');
App::uses('CakeSchema', 'Model');

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
		$this->autoRender = false;
		pr($this->__updateSchema());
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

/**
 * updateSchema method
 *
 * @return void
 */
	private function __updateSchema() {
		$this->Schema = new CakeSchema();
		$db = ConnectionManager::getDataSource($this->Schema->connection);
		$options = array();
		$Old = $this->Schema->read($options);
		$Schema = $this->Schema->load();
		$compare = $this->Schema->compare($Old, $Schema);
		$contents = array();

		if (empty($table)) {
			foreach ($compare as $table => $changes) {
				$update = $db->alterSchema(array($table => $changes), $table);
			}
		}
		$this->Installer->query($update);

	}
}