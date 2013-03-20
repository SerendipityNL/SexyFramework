<?php
class Base_View {

	// Initialize some variables
	private $template = null;
	private $data = array();
	private $rendered = 0;

	public function __construct($template = null) {

		// Check if an template has been set
		if ( ! empty($template)) {

			// Set the path to the template file
			$template_path = 'templates/'.$template.'.php';

			// Check if the template file exists
			if (file_exists($template_path)) {

				// Set the object variable
				$this->template = $template_path;
			}
			else {
				// Template file not found
				die('Template file not found');
			}
		}
		
	}

	public function template($template) {
		// Set the path to the template file
		$template_path = 'templates/'.$template.'.php';
		
		// Check if the template file exists
		if (file_exists($template_path)) {

			// Set the object variable
			$this->template = $template_path;
		}
		else {
			// Template file not found
			die('Template file not found');
		}
	}

	public function set($name, $value) {
		// Check if an name and value has been set
		if( ! empty($name) && ! empty($value)) {
			$this->data[$name] = $value;
		}
	}

	public function render($page) {

		// Build the variables for the view
		foreach ($this->data as $k => $v) {
			// Set the value as an string
			$$k = $v;
		}

		// Set the path to the view file
		$page_path = 'application/views/'.$page.'.php';
		
		// Check if the view file exists
		if (file_exists($page_path)) {

			// Check if another page has been rendered
			if ($this->rendered != 1) {

				// Set the page to rendered
				$this->rendered = 1;

				// Start an output buffer and catch all output
				ob_start();

				// Include the view file
				include_once $page_path;

				// Put the catched output into the $content variable and clean the output buffer
				$content = ob_get_clean();

				// Check if an template has been set
				if ( ! empty($this->template)) {

					// Include the template file
					include_once $this->template;
				}
				else {
					// Show the content
					echo $content;
				}
			}
		}
		else {
			// The view doesn't exists, include an error page
			router::render_404();
		}
	}

	public function msg($type, $title, $details = array()) {
		$_SESSION['msg_type'] = $type;
		$_SESSION['msg_title'] = $title;
		if ( ! empty($details)) {
			$_SESSION['msg_details'] = $details;
		}
	}

	protected function render_msg() {
		// Check if an session has been set
		if (isset($_SESSION['msg_type']) && isset($_SESSION['msg_title'])) {

			// Set the message vars
			$type = $_SESSION['msg_type'];
			$title = $_SESSION['msg_title'];
			$details = $_SESSION['msg_details'];
			
			// Unset the message session vars
			unset($_SESSION['msg_type'], $_SESSION['msg_title'], $_SESSION['msg_details']);

			// Build the needed html
			$html  = '<div class="msg msg_'.$type.'">';
			$html .= '<div class="msg_title">'.$title.'</div>';
			if ( ! empty($details)) {
				$html .= '<ul>';
				foreach ($details as $item) {
					$html .= '<li>'.$item.'</li>';
				}
				$html .= '</ul>';
			}
			$html .= '</div>';

			// Return the html
			return $html;
		}
	}

}
?>