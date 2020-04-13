<?php
	include '../classes/File.php';

	$msg = "";

	if (isset($_POST['number'])) {
		
		$accounts = File::get('../data/account.json');

		if( isset($accounts[$_POST['number']]) )
			$msg = "This account is already exists.";
		else {
			$accounts[$_POST['number']] = [
				'number' => $_POST['number'],
				'name' => $_POST['name'],
				'age' => $_POST['age'],
				'phone' => $_POST['phone'],
				'balance' => $_POST['balance']
			];

			if (File::put('../data/account.json', $accounts))
				$msg = "Account created successfully";
			else
				$msg = "Account is not created. Please, try again";
		}
	}

	include '../header.php';
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php include '../navigation.php'; ?>
			</div>
			<div class="col-md-6">
				<h3 class = "mt-3 mb-3">Account Creating Form</h3>

				<?php echo $msg ? '<div class="alert alert-info">'.$msg.'</div>' : ''; ?>

				<form action="create.php" method = "POST">
					<label for="">Account Number</label>
					<input type="number" name = "number" class = "form-control mb-2" autofocus>
					<label for="">User Name</label>
					<input type="text" name = "name" class = "form-control mb-2">
					<label for="">Age</label>
					<input type="number" name = "age" class = "form-control mb-2">
					<label for="">Phone number</label>
					<input type="number" name = "phone" class = "form-control mb-2">
					<label for="">Balance</label>
					<input type="number" name = "balance" class = "form-control mb-2">

					<input type="submit" class = "btn btn-primary">
				</form>
			</div>
		</div>
	</div>

<?php include '../footer.php'; ?>