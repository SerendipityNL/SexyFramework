<?php
// After a date is retrieved from the database, format it the way you want
function format_date($format, $date) {
	$date = strtotime($date);
	return date($format, $date);
}

?>