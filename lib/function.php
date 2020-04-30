<?php

function route() {
	return trim(current(array_keys($_GET)), '/');
}

function url($file = ''){
	$root = str_replace("index.php", "", $_SERVER['PHP_SELF']);
	return $root.$file;
}

function get_header() {
	include 'pages/header.php';
}
function get_footer() {
	include 'pages/footer.php';
}
function get_nav() {
	include 'pages/navigation.php';
}

function redirect($url)
{
	header("location: ". url($url));
}

function beautifyDate($date)
{
	$month = [ 'jan',  'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
	$date = explode("-", $date);
	return "{$date[2]} {$month[(int)$date - 1]}, {$date[0]}";
}
