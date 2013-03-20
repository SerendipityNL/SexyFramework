<?php
class language {

	// Available languages (language => dictionary)
	public static $language_files = array(
		"DE" => "german.json",
		"EN" => "english.json",
		"FR" => "french.json",
		"NL" => "dutch.json"
	);

	public static function set($language = null, $type = null) {

		// Check if the language exists in the language array
		if(array_key_exists($language, self::$language_files)) {

			// Set the language cookie to the specified value
			$lang = strtoupper($language);
		}
		else {

			// Set the language cookie to the default
			$lang = 'NL';
		}

		if ($type == 'cms') {
			setcookie('cms_lang', $lang, time()+3600*24*30, '/');
		}
		else {
			setcookie('lang', $lang, time()+3600*24*30, '/');
		}
		
	}

	public static function get() {
		if( ! array_key_exists($_COOKIE['lang'], self::$language_files)) {
			// Lang cookie not defined, set the default
			$lang = self::set();
		}
		else {
			$lang = $_COOKIE['lang'];
		}
		return $lang;
	}
	
	public static function translate($text) {
		// Get the current language
		$lang = self::get();
		
		// Set the path to the JSON containing the language
		$file_path = 'assets/i18n/'.self::$language_files[$lang];

		// Get the content of the JSON file
		$file_content = file_get_contents($file_path);

		// Decode the JSON file to an php object
		$json = json_decode($file_content);

		if(!empty($json->$text)) {
			// Return the requested text
			return $json->$text;
		}
		else {
			return $text;
		}

		
		
	}

}

// Short function to quickly translate some text
function t($text) {
	return language::translate($text);
}

function ut($text) {
	return ucfirst(t($text));
}
?>