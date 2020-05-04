<?php

/* Classes */

	$classes = [
		'File',
		'Arr',
		'Session',
	];

	foreach($classes as $class)
		include 'lib/classes/'. $class . '.php';

/* Models */

	$models = [
		'Model',
		'Account',
		'Withdraw',
		'Deposite',
		'Statement',
		'User'
	];

	foreach($models as $model)
		include 'models/'. $model . '.php';

/* Functions */

	include 'lib/function.php';
