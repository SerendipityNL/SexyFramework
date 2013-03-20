<?php
/*
* Form helper examples:
* 
* form::open('my_form', array('method' => 'get'))
* 
* form::textfield('name', 'Paul')
* 
* form::label('name', 'Name:')
* 
* form::select('check', array(1 => 'Yes', 0 => 'No'), '1')
* 
* form::date_select('planned', '2012-08-24')
* 
* form::textarea('description', 'Lorem ipsul dolar sit...')
* 
* 
* 
* 
* 
* 
*/
class form {

	public static function open($action = null, $attr = array()) {
		if( ! $action) {
			$attr['action'] = router::get('url');
		}
		else {
			$attr['action'] = $action;	
		}
		if(empty($attr['method'])) {
			$attr['method'] = 'post';
		}
		echo '<form '.html::attributes($attr).' >';
	}

	public static function textfield($name, $value = null, $attr = array()) {
		$attr['type'] = 'text';
		$attr['name'] = $name;
		$attr['value'] = $value;
		$attr['id'] = ' id_'.$name;
		if(empty($attr['size'])) {
			$attr['size'] = 30;
		}
		echo '<input '.html::attributes($attr).' />';
	}

	public static function email($name, $value = null, $attr = array()) {
		$attr['type'] = 'email';
		$attr['name'] = $name;
		$attr['value'] = $value;
		if(empty($attr['size'])) {
			$attr['size'] = 30;
		}
		echo '<input '.html::attributes($attr).' />';
	}

	public static function password($name, $value, $attr = array()) {
		$attr['type'] = 'password';
		$attr['name'] = $name;
		$attr['value'] = $value;
		$attr['id'] = ' id_'.$name;
		if(empty($attr['size'])) {
			$attr['size'] = 30;
		}
		echo '<input '.html::attributes($attr).' />';
	}

	public static function label($for, $name, $attr = array()) {
		$attr['for'] = ' id_'.$for;
		echo '<label '.html::attributes($attr).'>'.$name.'</label>';
	}

	public static function select($name, $options, $selected, $attr = array()) {
		$attr['name'] = $name;

		$select = '<select '.html::attributes($attr).'>';
		if( ! empty($options)) {
			foreach ($options as $value => $name) {
				$option_attr['value'] = $value;
				if($value == $selected) {
					$select .= '<option '.html::attributes($option_attr).' selected="selected">'.$name.'</option>';
				}
				else {
					$select .= '<option '.html::attributes($option_attr).'>'.$name.'</option>';
				}
			}	
		}
		$select .= '</select>';

		echo $select;
	}

	public static function date_select($name, $date = '', $attr = array()) {
		
		if( ! empty($date)) {
			$date = strtotime($date);
			$d = date('d', $date);
			$m = date('m', $date);
			$y = date('Y', $date);	
		}

		$months = array(
			'' => '',
			1 => 'januari',
			2 => 'februari',
			3 => 'maart',
			4 => 'april',
			5 => 'mei',
			6 => 'juni',
			7 => 'juli',
			8 => 'augustus',
			9 => 'september',
			10 => 'oktober',
			11 => 'november',
			12 => 'december'
		);

		$select  = form::textfield($name.'[d]', $d, array('size' => 3)).' ';
		$select .= form::select($name.'[m]', $months, $m).' ';
		$select .= form::textfield($name.'[y]', $y, array('size' => 6));

		echo $select;
	}

	public static function radio($name, $options, $checked = null, $attr = array()) {
		$attr['type'] = 'radio';
		$attr['class'] = 'radio';
		$html = '';

		$attr['name'] = $name;
		foreach($options as $value => $name) {
			$attr['value'] = $value;
			if ($value == $checked) {
				$attr['checked'] = 'checked';
			}
			else {
				unset($attr['checked']);
			}
			$html .= '<label class="wrap_label"><input '.html::attributes($attr).' ></input> '.$name.'</label>';
		}
		
		echo $html;
	}

	public static function textarea($name, $value, $attr = array()) {
		$attr['name'] = $name;
		echo '<textarea '.html::attributes($attr).'>'.$value.'</textarea>';
	}

	public static function button($name, $url, $attr = array()) {
		$attr['value'] = $name;
		$attr['onclick'] = 'parent.location=\''.$url.'\'';
		echo '<input type="button" '.html::attributes($attr).' />';
	}

	public static function submit($name, $attr = array()) {
		$attr['type'] = 'submit';
		$attr['value'] = $name;
		echo '<input '.html::attributes($attr).' />';
	}

	public static function hidden($name, $value, $attr = array()) {
		$attr['type'] = 'hidden';
		$attr['name'] = $name;
		$attr['value'] = $value;
		echo '<input '.html::attributes($attr).' />';
	}

	public static function file($name) {
		$attr['type'] = 'file';
		$attr['name'] = $name;
		echo '<input '.html::attributes($attr).' />';
	}

	public static function close() {
		echo '</form>';
	}

}
?>