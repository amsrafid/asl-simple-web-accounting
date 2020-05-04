<?php

	/**
	 * Include necessary files
	 * - Classes
	 * - Models
	 * - functions
	 */
	include 'global.php';

	
	/* Start Session */
	new Session();
	
	/* Get Route */
	$route = route();

	/**
	 * Include File in related with route
	 * when no route is found
	 * include home.php
	 */

	if (Session::auth()) {
		if($route)
			if(file_exists('pages/' .$route.'.php'))
				include 'pages/' .$route.'.php';
			else
				include 'pages/404.php';
		else
			include 'pages/home.php';
	} else
		include 'pages/login.php';
