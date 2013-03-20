<?php
class html {

	public static function attributes($attr = array()) {
		if ( ! empty($attr)) {
			foreach ($attr as $key => $value) {
				// Escape the special characters
				$attributes[] = $key.'="'.htmlspecialchars($value).'"';
			}
			$attributes = implode(' ', $attributes);
			return $attributes;
		}
		else {
			return null;
		}
	}

	public static function a($link = null, $name = null, $attr = array()) {
		if ( ! $name) {
			$name = $link;
		}
		
		if (empty($link)) {
			$attr['href'] = BASE_PATH;
		}
		else {
			if (strpos($link, 'http') === false) {
				$attr['href'] = BASE_PATH.$link;	
			}
			else {
				$attr['target'] = '_blank';
				$attr['href'] = $link;
			}
		}

		echo '<a '.html::attributes($attr).'>'.$name.'</a>';
	}

	public static function image($link, $attr = array()) {
		if (strpos($link, 'http') === false) {
			$attr['src'] = BASE_PATH.$link;
		}
		else {
			$attr['src'] = $link;
		}
		
		if (empty($attr['alt']))	{
			$attr['alt'] = $link;
		}

		if (empty($attr['width']) || empty($attr['height'])) {
			if (@fopen($attr['src'], "r")) {
				$info = getimagesize($attr['src']);
				$attr['width'] = $info[0];
				$attr['height'] = $info[1];
			}	
		}		
		
		echo '<img '.html::attributes($attr).' />';
	}

	public static function stylesheet($link, $attr = array()) {
		if (strpos($link, 'http') === false) {
			$attr['href'] = BASE_PATH.$link;
		}
		else {
			$attr['href'] = $link;
		}
		$attr['rel'] = 'stylesheet';
		$attr['type'] = 'text/css';

		echo '<link '.html::attributes($attr).' />';
	}

	public static function javascript($link, $attr = array()) {
		$attr['type'] = 'text/javascript';
		
		if (strpos($link, 'http') === false) {
			$attr['src'] = BASE_PATH.$link;
		}
		else {
			$attr['src'] = $link;
		}

		echo '<script '.html::attributes($attr).'></script>';
	}

}
?>