<?php
class plural {
	
	//Define singular patterns and plural solutions
	public static $plural = array(
		'/(quiz)$/i'						=> "$1zes",
		'/^(ox)$/i'							=> "$1en",
		'/([m|l])ouse$/i'					=> "$1ice",
		'/(matr|vert|ind)ix|ex$/i'			=> "$1ices",
		'/(x|ch|ss|sh)$/i'					=> "$1es",
		'/([^aeiouy]|qu)y$/i'				=> "$1ies",
		'/(hive)$/i'						=> "$1s",
		'/(?:([^f])fe|([lr])f)$/i'			=> "$1$2ves",
		'/(shea|lea|loa|thie)f$/i'			=> "$1ves",
		'/sis$/i'							=> "ses",
		'/([ti])um$/i'						=> "$1a",
		'/(tomat|potat|ech|her|vet)o$/i'	=> "$1oes",
		'/(bu)s$/i'							=> "$1ses",
		'/(alias)$/i'						=> "$1es",
		'/(octop)us$/i'						=> "$1i",
		'/(ax|test)is$/i'					=> "$1es",
		'/(us)$/i'							=> "$1es",
		'/s$/i'								=> "s",
		'/$/'								=> "s"
	);
	
	//Define plural patterns and singular solutions
	public static $singular = array(
		'/(quiz)zes$/i'						=> "$1",
		'/(matr)ices$/i'					=> "$1ix",
		'/(vert|ind)ices$/i'				=> "$1ex",
		'/^(ox)en$/i'						=> "$1",
		'/(alias)es$/i'						=> "$1",
		'/(octop|vir)i$/i'					=> "$1us",
		'/(cris|ax|test)es$/i'				=> "$1is",
		'/(shoe)s$/i'						=> "$1",
		'/(o)es$/i'							=> "$1",
		'/(bus)es$/i'						=> "$1",
		'/([m|l])ice$/i'					=> "$1ouse",
		'/(x|ch|ss|sh)es$/i'				=> "$1",
		'/(m)ovies$/i'						=> "$1ovie",
		'/(s)eries$/i'						=> "$1erie",
		'/([^aeiouy]|qu)ies$/i'				=> "$1y",
		'/([lr])ves$/i'						=> "$1f",
		'/(tive)s$/i'						=> "$1",
		'/(hive)s$/i'						=> "$1",
		'/(li|wi|kni)ves$/i'				=> "$1fe",
		'/(shea|loa|lea|thie)ves$/i'		=> "$1f",
		'/(^analy)ses$/i'					=> "$1sis",
		'/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i'  => "$1$2sis",
		'/([ti])a$/i'						=> "$1um",
		'/(n)ews$/i'						=> "$1ews",
		'/(h|bl)ouses$/i'					=> "$1ouse",
		'/(corpse)s$/i'						=> "$1",
		'/(us)es$/i'						=> "$1",
		'/s$/i'								=> ""
	);
	
	//Define words that have irregular plural forms
	public static $irregular = array(
		'move'								=> 'moves',
		'foot'								=> 'feet',
		'goose'								=> 'geese',
		'sex'								=> 'sexes',
		'child'								=> 'children',
		'man'								=> 'men',
		'tooth'								=> 'teeth',
		'person'							=> 'people'
	);
	
	
	//Define words that are uncountable
	public static $uncountable = array(
		'sheep',
		'fish',
		'deer',
		'series',
		'species',
		'money',
		'rice',
		'information',
		'equipment',
		'compose'
	);
	
	public static function demodelize($text){
		$substring = substr($text, -6, 6);
		if ($substring == '_model'){
			return substr($text, 0, -6);
		} 
		else {
			return $text;
		}
	}	
	
	public static function pluralize($text){
		$word = self::demodelize($text);
		
		if (in_array(strtolower($word), self::$uncountable))
			return $word;
		
		foreach (self::$irregular as $pattern => $result){
			$pattern = '/'.$pattern.'$/i';
			
			if (preg_match($pattern, $word))
			return preg_replace($pattern, $result, $word);
		}
		
		foreach (self::$plural as $pattern => $result){
			if (preg_match($pattern, $word))
			return preg_replace($pattern, $result, $word);
		}
		return $word;
	}
	
	public static function singularize($word){
		if (in_array(strtolower($word), self::$uncountable))
			return $word;
		
		foreach (self::$irregular as $result => $pattern){
			$pattern = '/'.$pattern.'$/i';
			
			if (preg_match($pattern, $word))
			return preg_replace($pattern, $result, $word);
		}
		
		foreach (self::$singular as $pattern => $result){
			if (preg_match( $pattern, $word))
			return preg_replace($pattern, $result, $word);
		}
		
		return $word;
	}
	
}

function p($text){
	return plural::pluralize($text);
}

function s($text){
	return plural::singularize($text);
}
?>