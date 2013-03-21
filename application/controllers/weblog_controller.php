<?php
defined('BASE_PATH') or die('No direct script access.');

class Menu_Controller extends Base_Controller {

	protected $_set_template = 'menu';

	protected function constructor() {
		$this->Category = load::model('Category');		
	}
	
	public function action_index() {
	
		//$this->view->set('offers', $this->Product->find_offers());
		//$categories = $this->Category->find_by_parent(0);

		//$this->view->set('categories', $categories);
		$this->view->render('weblog/index');

		/*
		NEEDED FOR FILTERING OUT EMPTY CATEGORIES, NEEDS TO BE CATCHED IN THE MODEL!!
		if ( ! empty($menus)){
			foreach($menus as $m){
				if($this->Category->find_by_parent($m->id) || $this->Product->find_by_category($m->id) ){
					$categories[] = $m;
				}
			}
		}	

		*/	

	}


}