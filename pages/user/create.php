<?php
	$msg = "";
	$mode = "";

	$userOld = [];

	if(isset($_GET['q'])) {
		$userOld = User::find($_GET['q']);
		$mode = "?q=".$_GET['q'];
	}
	
	if (isset($_POST['phone'])) {
		
		$user = [
			'name' => $_POST['name'],
			'age' => $_POST['age'],
			'phone' => $_POST['phone'],
			'email' => isset($_POST['email']) ? $_POST['email'] : $userOld['email'],
			'address' => $_POST['address'],
		];

		if($mode) {	/* In Edit mode */
			 $user['password'] = $_POST['password'] ? md5($_POST['password']) : $userOld['password'];

			if (User::update($user, $_GET['q']))
				redirect('user/all/?msg='."User is updated successfully.");
			else
				$msg = "User is not updated. Please, try again";

		} else {	/* Create mode */
			$user['password'] = md5($_POST['password']);

			if (User::create($user))
				redirect('user/all/?msg='."User has been created successfully.");
			else
				$msg = "User is not created. Please, try again.";
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
			<h3 class = "mt-3 mb-3">User Registration Form</h3>

			<?php echo $msg ? '<div class="alert alert-info">'.$msg.'</div>' : ''; ?>

			<form action="<?= url('user/create/'.$mode) ?>" method = "POST">
				<label for="">User Name *</label>
				<input type="text" name = "name" value = "<?= Arr::has($userOld, 'name'); ?>" class = "form-control mb-2" required>
				<label for="">Age</label>
				<input type="number" name = "age" value = "<?= Arr::has($userOld, 'age'); ?>" class = "form-control mb-2">
				<label for="">Phone number *</label>
				<input type="number" name = "phone" value = "<?= Arr::has($userOld, 'phone'); ?>" class = "form-control mb-2" required>
				<label for="">Email *</label>
				<input type="email" name = "email" value = "<?= Arr::has($userOld, 'email'); ?>" class = "form-control mb-2" required <?= $mode ? "disabled" : ""; ?>>
				<label for="">Address</label>
				<input type="text" name = "address" value = "<?= Arr::has($userOld, 'address'); ?>" class = "form-control mb-2">
				<label for="">Password <?= $mode ? "" : "*"; ?></label>
				<input type="password" name = "password" class = "form-control mb-2" <?= $mode ? "" : "required"; ?> placeholder = "*******************">
				
				<input type="submit" name = "submit" class = "btn btn-primary">
			</form>
		</div>
	</div>
</div>

<?php get_footer(); ?>