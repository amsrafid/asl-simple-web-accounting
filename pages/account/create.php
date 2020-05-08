<?php
	$msg = "";
	$mode = "";

	$acc = [];

	if(isset($_GET['number'])) {
		$acc = Account::find($_GET['number']);
		$mode = "?number=".$_GET['number'];
	}
	
	if (isset($_POST['number'])) {
		
		$accounts = Account::all();
		$accounts[$_POST['number']] = [
			'number' => $_POST['number'],
			'name' => $_POST['name'],
			'age' => $_POST['age'],
			'phone' => $_POST['phone'],
			'balance' => $_POST['balance']
		];

		if($mode) {	/* In Edit mode */
			if( Account::find($_POST['number']) ) {
				if (Account::update($accounts))
					redirect('account/all/?msg='."Account updated successfully");
				else
					$msg = "Account is not updated. Please, try again";
			}
			else {
				$msg = "This account is already exists.";
			}

		} else {	/* Create mode */
			if( Account::find($_POST['number']) )
				$msg = "This account is already exists.";
			else {
				if (Account::create($accounts))
					redirect('account/all/?msg='."Account created successfully");
				else
					$msg = "Account is not created. Please, try again";
			}
		}
	}

	get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php get_nav(); ?>
		</div>
		<div class="col-md-6">
			<h3 class = "mt-3 mb-3">Account Creating Form</h3>

			<?php echo $msg ? '<div class="alert alert-info">'.$msg.'</div>' : ''; ?>

			<form action="<?= url('account/create/'.$mode) ?>" method = "POST">
				<?= $mode ? "" : '<label for="">Account Number</label>'; ?>
				<input type="<?= $mode ? "hidden" : "number"; ?>" name = "number" value = "<?= Arr::has($acc, 'number'); ?>" class = "form-control mb-2" autofocus>
				<label for="">User Name</label>
				<input type="text" name = "name" value = "<?= Arr::has($acc, 'name'); ?>" class = "form-control mb-2">
				<label for="">Age</label>
				<input type="number" name = "age" value = "<?= Arr::has($acc, 'age'); ?>" class = "form-control mb-2">
				<label for="">Phone number</label>
				<input type="number" name = "phone" value = "<?= Arr::has($acc, 'phone'); ?>" class = "form-control mb-2">
				<?= $mode ? "" : '<label for="">Balance</label>'; ?>
				<input type="<?= $mode ? "hidden" : "number"; ?>" name = "balance" value = "<?= Arr::has($acc, 'balance'); ?>" class = "form-control mb-2">

				<input type="submit" name = "submit" class = "btn btn-primary">
			</form>
		</div>
	</div>
</div>

<?php get_footer(); ?>