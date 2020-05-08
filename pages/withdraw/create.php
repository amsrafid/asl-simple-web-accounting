<?php
	$msg = "";

	if(isset($_POST['number'])) {
		
		$withdraw = [
			'number' 	=> $_POST['number'],
			'amount'	=> $_POST['amount'],
			'date' 		=> date('Y-m-d'),
		];

		$account = Account::find($_POST['number']);

		if($account['balance'] >= $_POST['amount']) {
			if(Withdraw::create($withdraw)) {
				$account['balance'] -= $_POST['amount'];
				Account::update($account, $_POST['number']);
				
				$withdraw['status'] = 'debit';
				Statement::create($withdraw);
	
				redirect('withdraw/all/?msg=Withdraw is created successfully.');
			}
			else
				redirect('withdraw/all/?msg=Withdraw is not created.');
		} else
			redirect('withdraw/all/?msg=This account has not sufficient balance.');
	}

	get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php get_nav(); ?>
		</div>
		<div class="col-md-6">
			<h3 class = "mt-3 mb-3">Withdraw Creating Form</h3>

			<?php echo $msg ? '<div class="alert alert-info">'.$msg.'</div>' : ''; ?>

			<form action="<?= url('withdraw/create/') ?>" method = "POST">

				<label for="number">Account Number *</label>
				<input type="number" class = "form-control" min = "1" name = "number" required authfocus />
				<label for="number" class = "mt-3">Amount *</label>
				<input type="number" class = "form-control" min = "1" name = "amount" required />

				<input type="submit" name = "submit" class = "btn btn-primary mt-3">
			</form>
		</div>
	</div>
</div>

<?php get_footer(); ?>