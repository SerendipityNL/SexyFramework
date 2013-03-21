<?php
class Base_Controller {

	private $_controller = null;

	protected $_data = null;

	protected $view = null;

	// Magic setter function
	public function __set($name, $value) {
		$this->_data[$name] = $value;
	}

	// Magic getter function
	public function __get($name) {
		return $this->_data[$name];
	}

	public function initialize() {
		// Get the controller class and strip the 'Controller_' part
		$this->_controller = substr(get_class($this), 0, -11);

		$this->load_model();
		$this->load_view();

		if (method_exists($this, 'constructor')) {
			$this->constructor();
		}
	}

	protected function redirect($location) {

		// If the location is / , redirect to the base
		if ($location == '/') {
			$url = BASE_PATH;
		}
		// Check wether the location is an external link or not
		elseif (strpos($location, 'http') === false) {
			$url = BASE_PATH.$location;
		}
		else {
			$url = $location;
		}

		// If the debug mode is on; don't redirect
		if (DEBUG_MODE == 0) {
			header('Location: '.$url);
			exit();
		}
	}
	
	// This function builds a success message
	protected function msg_success($title, $details = array()) {
		$this->set_msg('success', $title, $details);
	}
	
	// This function builds a notification
	protected function msg_notification($title, $details = array()) {
		$this->set_msg('notification', $title, $details);
	}

	// This function builds an error message
	protected function msg_error($title, $details = array()) {
		$this->set_msg('info', $title, $details);
	}
	
	// This function puts all the messages in an array, that can be outputted in the new page
	private function set_msg($type, $title, $details = array()) {
		$_SESSION['msg_type'] = $type;
		$_SESSION['msg_title'] = $title;
		if ( ! empty($details)) {
			$_SESSION['msg_details'] = $details;
		}
	}

	private function load_model() {
		// Set the model_name, strip the last 11 chars (_Controller), and singularize it
		$model_name = s($this->_controller);

		// Set the variable variable name
		$model = 'model_name';

		// Load the correct model
		$this->${$model} = load::model($model_name);
	}

	private function load_view() {
		// No template specified, use the default from config/settings.php
		if (empty($this->_set_template)) {
			$template = DEFAULT_TEMPLATE;
		}

		// Set the defined template
		else {
			$template = $this->_set_template;
		}

		// Load the view
		$this->view = load::view($template);
	}

}
?>