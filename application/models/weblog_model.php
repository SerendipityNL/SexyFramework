<?php
class Weblog_Model extends Base_Model {

	protected $_set_table = 'weblog';

	protected $_validation_rules = array(
		'author' => array(
			array('not_empty' => 'Author cannot be empty'),
			array('min_length:3' => 'The author name must be at least 6 characters long')
		),
		'title' => array(
			array('not_empty' => 'The title can\'t be blank'),
			array('min_length:6' => 'The title must be at least 6 characters long')
		),		
		'content' => array(
			array('not_empty' => 'The content can\'t be blank'),
			array('min_length:15' => 'The content must be at least 15 characters long')
		)
	);
	
	public function save($data, $id = null) {	
		if ($this->validate($data)){
			echo 'Hij valideert';
			if (empty($id)) {
				//$this->insert($data);
			}
			else {
				//$this->update($data, $id);
			}
			// Data validates
			return true;
		}
		else {
			// Data doesn't validate
			return false;
		}
	}

	public function find_all() {
		return $this->sort('created_at DESC')->limit(10)->find('all');
	}


}