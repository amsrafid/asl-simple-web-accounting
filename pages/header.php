<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accounting</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= url('asset/css/style.css'); ?>">
</head>
<body>

<?php if(Session::auth()) { ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<header class = "header text-right">
					<a href="<?= url('login'); ?>" class="d-inline">Logout</a>
				</header>
			</div>
		</div>
	</div>
<?php } ?>