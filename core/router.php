<?php
/*
* Default vars
* 
* www.example.com/users/view/432
*                  |     |    |
*               page(0)  |    |
*                   action(1) |
*                            id(2)
*
*/

class router {

	private $_default_controller = DEFAULT_CONTROLLER;
	private $_default_action = DEFAULT_ACTION;
	public static $_url = array();
	
	// Initialize the router, set the controller and action
	public function init() {

		$path = 'application/controllers/';

		// Get the requested url
		$request = $_GET['req'];

		// Check wether the requested route is in the routes file or not
		if ($route = $this->in_routes($request)) {
			$request = $route;
		}

		// Make an array of the request
		$url = explode('/', $request);
		
		// Check wether the first part of the request is a subfolder in controllers. If this is true, shift the array
		if (is_dir($path.$url[0])) {
			$path = $path.$url[0].'/';
			array_shift($url);
		}

		// Set the requested page and action variables with values from the url variable
		list($page, $action) = $url;
		$parameters = array_slice($url, 2);

		// Set the controller to default, then set the default controller
		if (empty($page)) {
			$page = DEFAULT_CONTROLLER;
		}		

		// Set the action to index, if there is no action given
		if (empty($action)) {
			$action = DEFAULT_ACTION;
		}

		// Set the class variables, so the values are retrievable later
		self::$_url['page'] = $page;
		self::$_url['action'] = $action;
		self::$_url['url'] = BASE_PATH.$request;

		// Set the correct names of the action and the controllers
		$action = 'action_'.$action;
		$controller_path = $path.$page.'_controller.php';
		$controller_name = ucfirst($page.'_Controller');

		// Check if the file exists
		if (file_exists($controller_path)) {
			include $controller_path;
			
			// Check if the class exists
			if (class_exists($controller_name)) {
				$controller = new $controller_name;
				
				// Check if the action exists
				if (method_exists($controller, $action)) {
				
					// Initialize the action
					call_user_func(array($controller, 'initialize'));
					
					// If there are any parameters given, pass them on to the action
					if (empty($parameters)) {
						call_user_func(array($controller, $action));
					}
					else {
						call_user_func_array(array($controller, $action), $parameters);
					}
				}
				else {
					$this->render_404();
				}
			}
			else {
				$this->render_404();
			}
		}
	
	}
	
	private function in_routes($request = null) {
		// Check if there is a value in request
		if (empty($request)) {
			return false;
		}
		
		// Load the custom routes file
		include 'config/routes.php';
		
		// Split the request
		$url = explode('/', $request);

		// Loop through the routes
		foreach ($routes as $route => $function) {

			// Set match to zero
			$match = 0;

			// Split the route
			$parts = explode('/', $route);

			// Check wether the custom route has the same number of elements as the custom route
			if (count($parts) == count($url)) {
				
				// Loop through all the routes
				for ($i = 0; $i < count($parts); $i++) {
					
					// For each part that matches, increase match
					if ($parts[$i] == $url[$i]) {
						$match += 1;
					}
					
					// If there is an variable in the custom route, increase match
					elseif ($parts[$i] == '*') {
						$match += 1;
						$vars[$route] .= '/'.$url[$i];
					}
				}
			}
			
			// If the value of match is the same as tha parts of the url, which means an exact match, return the custom url
			if ($match == count($url)) {
				$request = str_replace(':', '/', $function).$vars[$route];
				return $request;
			}

		}

	}

	// Handles the rendering of a 403 page (Restriced access)
	public static function render_403() {
		header('HTTP/1.1 403 Forbidden');
		include_once 'templates/403.php';
	}

	// Handles the rendering of a 404 page (No page found)
	public static function render_404() {
		header("HTTP/1.0 404 Not Found");
		include_once 'templates/404.php';
	}

	// A function to get parts of the URL from within controller
	public static function get($part = null) {
		if ( ! empty($part)) {
			return self::$_url[$part];
		}
		else {
			return null;
		}
	}

}

// A function to shorten the router::get() request to get()
function get($part) {
	return router::get($part);
}

?>
