<?php
App::uses('AppModel', 'Model');
/**
 * Paste Model
 *
 */
class Paste extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Order field
 *
 * @var string
 */
	public $order = 'Paste.created DESC';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'paste_data' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
}
