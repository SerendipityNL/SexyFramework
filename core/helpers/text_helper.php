<?php
function price($price) {
	if(empty($price)) {
		$price = 0;
	}
	$price = number_format($price, 2, ',', '.');
	return '&euro; '.$price;
}

function debug($value) {
	echo '<pre>';
	print_r($value);
	echo '</pre>';
}
?>