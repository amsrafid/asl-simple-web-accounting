<?php

	/**
	 * Include necessary files
	 */
	include 'global.php';

	$route = route();

	/**
	 * Include File in related with route
	 * when no route is found
	 * include home.php
	 */
	if($route)
		include 'pages/' .$route.'.php';
	else
		include 'pages/home.php';
