<?php
class Admin_Controller extends Base_Controller {
	
	
	public function __construct() {
		// See where the user is going
		$action = get('action');
		$controller = get('controller');

		// Check whether there is an access level set
		if ( ! empty($this->access)) {
			// Check wether there is one level for the whole controller or levels per function
			if (is_array($this->access)) {
				// Check wether there is a level for the action or not
				if (isset($this->access[$action])) {
					$access = $this->access[$action];
				}
				// Check wether there is a default access set
				elseif(isset($this->access['default_access'])) {
					$access = $this->access['default_access'];
				}
			}
			// Is the acces numeric?
			elseif (is_numeric($this->access)) {
				$access = $this->access;
			}
			// Die when the access is not right
			else {
				die('Rechten kloppen niet..');
			}
		}
		// If there is no access level set, set it to one
		else {
			$access = 1;
		}
		
		// If the user does not have the right access level, display a 403 page
		if (user::role() < $access) {
			router::render_403();
			die();
		}

	}

	// Check wether the user is logged in or not
	protected function logged_in() {
		if ($_SESSION['logged_in'] == true) {
			return true;
		}
		else {
			return false;
		}
	}

}
?>