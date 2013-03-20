<?php
defined('BASE_PATH') or die('No direct script access.');

class Menu_Controller extends Base_Controller {

	protected $_set_template = 'menu';

	protected function constructor() {
		$this->Category = load::model('Category');
		$this->Product = load::model('Product');
		$this->Location = load::model("Location");

		$this->view->set('location', $this->Location->find_by_id(LOCATION_TEMP));

		if (user::role(50)) {
			$this->Theme = load::model('Theme');
			$this->view->set('themes', $this->Theme->list_themes());
		}
	}
	
	public function action_index() {
	
		$this->view->set('offers', $this->Product->find_offers());
		$categories = $this->Category->find_by_parent(0);

		$this->view->set('categories', $categories);
		$this->view->render('menu/index');

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

	public function action_category($category_id) {
		$subcategories = $this->Category->find_by_parent($category_id);
		$products = $this->Product->find_by_category($category_id);

		if( ! empty($subcategories)){
			foreach ($subcategories as $s){
				if ($this->Category->find_by_parent($s['id']) || $this->Product->find_by_category($s['id'])){
					$categories[] = $s;
				}
			}
		}
		
		$this->view->set('categories', $categories);
		$this->view->set('products', $products);
		$this->view->render('menu/category');
	}

	public function action_product($product_id) {
		$this->view->set('p', $this->Product->find_by_id($product_id));
		$this->view->render('menu/product');

	}

	public function action_offers() {
		$this->view->set('products', $this->Product->find_offers());
		$this->view->render('menu/offers');
	}

	public function action_change_language($language = null) {
		language::set($language);
		$this->redirect('/');
	}

	public function action_contact() {
		$address = load::model('Address')->find_by_location(1);
		$contact = load::model('Contact')->find_by_location(1);
		$open = load::model('Opening_Hours')->find_by_location(1);

		$this->view->set('address', $address);
		$this->view->set('contact', $contact);
		$this->view->set('open', $open);
		$this->view->render('menu/contact');
	}

	public function action_info() {
		
		$images = load::model('Image')->list_dir('slider');
		$about = load::model('About')->find_by_location(1);
		$contact = load::model('Contact')->find_by_location(1);

		$this->view->set('images', $images);
		$this->view->set('about', $about);
		$this->view->set('contact', $contact);
		$this->view->render('menu/info');
	}

	public function action_products() {
		$query = $_GET['query'];
		
		if ( ! empty($query)) {
			$sql_name = "SELECT id, name, description, price FROM products WHERE name LIKE '%".$query."%'";
			$sql_description = "SELECT id, name, description, price FROM products WHERE name NOT LIKE '%".$query."%' AND description LIKE '%".$query."%'";
			$results['name'] = $this->Product->fetch_rows($sql_name);
			$results['description'] = $this->Product->fetch_rows($sql_description);
			foreach($results as $r){
				if( ! empty($r)){
					foreach($r as $key => $value){
						$products[] = $value;
					}
				}
			}
			if ( ! empty($products)) {
				header('Cache-Control: no-cache, must-revalidate');
				header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
				header('Content-type: application/json');
				echo json_encode($products);
			}
			else {
				echo null;
			}			
		}
		else {
			echo null;
		}		
	}

}