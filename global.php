<?php

/* Classes */

	$classes = [
		'File'
	];

	foreach($classes as $class)
		include 'lib/classes/'. $class . '.php';

/* Models */

	$models = [
		'Account'
	];

	foreach($models as $model)
		include 'models/'. $model . '.php';

/* Functions */

	include 'lib/function.php';
