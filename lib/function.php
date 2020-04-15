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
