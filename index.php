<?php

	include 'global.php';

	$route = route();

	if($route)
		include 'pages/' .$route.'.php';
	else
		include 'pages/home.php';
