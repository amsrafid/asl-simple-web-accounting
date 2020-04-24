<?php

/* Classes */

	$classes = [
		'File',
		'Arr',
	];

	foreach($classes as $class)
		include 'lib/classes/'. $class . '.php';

/* Models */

	$models = [
		'Model',
		'Account',
		'Withdraw',
		'Deposite',
		'Statement'
	];

	foreach($models as $model)
		include 'models/'. $model . '.php';

/* Functions */

	include 'lib/function.php';
