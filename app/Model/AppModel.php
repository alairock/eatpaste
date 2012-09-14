<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');
App::uses('CakeSchema', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

/**
 * importSchema method
 *
 * @return void
 */
	public function importSchema() {
		$this->Schema = new CakeSchema();      
		$Schema = $this->Schema->load();
		$db = ConnectionManager::getDataSource($this->Schema->connection);
		$contents = "\n\n" . $db->dropSchema($Schema) . "\n\n" . $db->createSchema($Schema);
		return $this->query($contents);
	}

/**
 * importData method
 *
 * @return void
 */
	public function importData() {
		$initialOptionData = array(
			array( 'Option' => array( 'name' => 'version', 'value' => '1.0.0', )),
			array( 'Option' => array( 'name' => 'non-version', 'value' => '1.0.2', )),
		);
		$initialUserData = array(
			array( 'User' => array( 'username' => 'skyler', 'password' => 'hi', )),
		);
		$this->create();
		return $this->saveMany($initialOptionData);
		//$this->User->saveMany($initialUserData);
	}
}
