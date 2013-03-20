<?php

class validate {
	
	public static function min_length($input, $field, $rule_value){
		if (strlen($input) >= $rule_value ){
			return true;
		} 
		else {
			return $field.' is shorter than ' . $rule_value;
		}
		
	}
	
	public static function max_length($input, $field, $rule_value){
		if (strlen($input) <= $rule_value ){
			return true;
		} 
		else {
			return $field.' is longer than ' . $rule_value;
		}		
	}
	
	public static function regex($input, $field, $rule_value){
		if (preg_match($rule_value, $input)){
			return true;
		}
		else {
			return $field.' has an incorrect value';
		}
	}
	
	public static function not_empty($input, $field){
		if (!empty($input)){
			return true;
		}
		else {
			return $field.' is empty';
		}
	}
	
	public static function numeric($input, $field){
		if (gettype($input) == 'integer'){
			return true;
		}
		else {
			return $field.' is not numeric';
		}
	}
	
	public static function email($input, $field){
		if (filter_var($input, FILTER_VALIDATE_EMAIL)){
			return true;
		}
		else {
			return $field.' is not a valid emailaddress';
		}
	}
	
}

?>