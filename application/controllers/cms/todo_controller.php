<?php
class Todo_Controller extends Admin_Controller {
	
	public function action_index(){
		$this->view->render('todo/index');
	}
}