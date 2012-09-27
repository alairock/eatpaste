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
		$upgrades = $this->__getUpgrades();
		$this->set(__('upgrades'), str_replace('V', '', $upgrades[0]['name']));
	}

	public function upgrade() {
		$this->set('upgrades', array_reverse($this->__getUpgrades()));
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

/**
 * __getUpgrades method
 *
 * @return void
 */
	public function __getUpgrades() {
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
				array_push($versions, $tags);
			}
		}
		return $versions;
	}

}