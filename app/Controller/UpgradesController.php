<?php
App::uses('AppController', 'Controller');
App::uses('CakeSchema', 'Model');

/**
 * Upgrades Controller
 *
 */
class UpgradesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

	public function index() {
		$this->autoRender = false;
		pr('upgrader');
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