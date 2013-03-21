<?php
defined('BASE_PATH') or die('No direct script access.');

class Weblog_Controller extends Base_Controller {

	protected function constructor() {
		$this->Weblog = load::model('Weblog');		
	}
	
	public function action_index() {
		$this->view->set('weblogs', $this->Weblog->find_all());
		$this->view->render('weblog/index');
	}

	public function action_view($weblog_id) {
		$this->view->set('weblog', $this->Weblog->find($weblog_id));
		$this->view->render('weblog/view');
	}

	public function action_new() {
		if ( ! empty($_POST)) {
			$weblog = $_POST;
			if ($this->Weblog->save($weblog)) {
				$this->msg_success('Weblog item is added!');
				$this->redirect('weblog');
			}
			else {
				$this->view->set('errors', $this->Weblog->errors);
			}
		}
		$this->view->render('weblog/new');
	}

	public function action_edit($weblog_id) {
		if ( ! empty($_POST)) {
			$weblog = $_POST;
			if ($this->Weblog->save($weblog, $weblog_id)) {
				$this->msg_success('Weblog item is updated!');
				$this->redirect('weblog');
			}
			else {
				$this->view->set('errors', $this->Weblog->errors);
			}
		}
		else {
			$weblog = $this->Weblog->find($weblog_id);
		}

		$this->view->set('weblog', $weblog);
		$this->view->render('weblog/edit');
	}

	public function action_delete($weblog_id) {
		$this->Weblog->delete($weblog_id);
		$this->msg_success('Weblog item is deleted!');
		$this->redirect('weblog');
	}


}