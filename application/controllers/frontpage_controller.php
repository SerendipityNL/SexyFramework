<?php
defined('BASE_PATH') or die('No direct script access.');

class Frontpage_Controller extends Base_Controller {

	protected function constructor() {
		$this->Weblog = load::model('Weblog');		
	}
	
	public function action_index() {
		$this->view->set('weblogs', $this->Weblog->find_all());
		$this->view->render('frontpage/index');
	}
	
	public function action_view($weblog_id) {
		$this->view->set('weblog', $this->Weblog->find($weblog_id));
		$this->view->render('frontpage/view');
	}
}