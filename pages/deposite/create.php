<?php
	$msg = "";
	$mode = "";

	$acc = [];

	if(isset($_POST['number'])) {
		
		Deposite::create([
			''
		]);
		
	}

	get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php get_nav(); ?>

			<div class="pt-5">
				<a href="<?= url('deposite/all'); ?>">View All</a>
			</div>

		</div>
		<div class="col-md-6">
			<h3 class = "mt-3 mb-3">Deposite Creating Form</h3>

			<?php echo $msg ? '<div class="alert alert-info">'.$msg.'</div>' : ''; ?>

			<form action="<?= url('deposite/create/') ?>" method = "POST">

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