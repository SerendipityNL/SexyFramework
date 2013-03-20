<?php
/*
* check_rights(num) 
* -1 = not active (banned)
* 1 = user
* 100 = admin
* 
* signed_in
* hash_password(password)
* 
*/

class user {
	
	public static $languages = array(
	'NL' => 'Nederlands',
	'EN' => 'Engels',
	'DE' => 'Duits',
	'FR' => 'Frans'
	);
	
	public static $stan_lang = 'NL';

	public static function role($num = null) {
		if ( ! empty($num)) {
			if($_SESSION['role'] >= $num) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			if ( ! empty($_SESSION['role'])) {
				return $_SESSION['role'];
			}
			else {
				return 0;
			}
		}
		
	}

}

?>