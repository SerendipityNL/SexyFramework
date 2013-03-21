<?php
defined('BASE_PATH') or die('No direct script access.');

class Weblog_Controller extends Base_Controller {

	protected function constructor() {
		$this->Weblog = load::model('Weblog');		
	}
	
	public function action_index() {
		$this->view->set('weblog', $this->Weblog->find_all());
		$this->view->render('weblog/index');
	}

	public function action_new() {
		if ( ! empty($_POST)) {
			$weblog = $_POST;
			if ($this->Weblog->save($weblog)) {
				// insert data
			}
			else {
				// render errors
			}
		}
		
		$this->view->render('weblog/new');
	}

	public function action_edit($weblog_id) {
		$this->view->render('weblog/edit');
	}

	public function action_delete() {
		$this->view->render('weblog/delete');
	}


}