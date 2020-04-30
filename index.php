<?php

	/**
	 * Include necessary files
	 * - Classes
	 * - Models
	 * - functions
	 */
	include 'global.php';

	$route = route();

	/**
	 * Include File in related with route
	 * when no route is found
	 * include home.php
	 */
	if($route)
		if(file_exists('pages/' .$route.'.php'))
			include 'pages/' .$route.'.php';
		else
			include 'pages/404.php';
	else
		include 'pages/home.php';
