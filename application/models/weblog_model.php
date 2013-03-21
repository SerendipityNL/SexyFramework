<?php
class Weblog_Model extends Base_Model {

	protected $_set_table = 'weblog';

	protected $_validation_rules = array(
		'firstname' => array(
			array('not_empty' => 'firstname_is_empty'),
			array('min_length:3' => 'firstname_not_long_enough')
		),
		'lastname' => array(
			array('not_empty' => 'lastname_is_empty'),
			array('min_length:3' => 'lastname_not_long_enough')
		),
		'email' => array(
			array('not_empty' => 'email_is_empty'),
			array('email' => 'email_is_no_email'),
			array('min_length:3' => 'email_not_long_enough')
		),
		'password' => array(
			array('not_empty' => 'password_is_empty'),
			array('min_length:8' => 'password_not_long_enough')
		)
	);
	
	public function save($data, $id = null) {
		if (empty($id)) {
			$this->insert($data);
		}
		else {
			$this->update($data, $id);
		}
	}

	public function find_all() {
		return $this->sort('created_at DESC')->limit(10)->find('all');
	}


}