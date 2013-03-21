<?php
defined('BASE_PATH') or die('No direct script access.');

class Weblog_Controller extends Base_Controller {

	protected function constructor() {
		$this->Weblog = load::model('Weblog');		
	}
	
	public function action_index() {
	
		//$this->view->set('offers', $this->Product->find_offers());
		//$categories = $this->Category->find_by_parent(0);

		//$this->view->set('categories', $categories);
		$this->view->render('weblog/index');
	}

	public function action_new() {
		$this->view->render('weblog/new');
	}

	public function action_edit() {
		$this->view->render('weblog/edit');
	}

	public function action_delete() {
		$this->view->render('weblog/delete');
	}


}