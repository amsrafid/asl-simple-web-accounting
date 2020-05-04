<?php
	$msg = "";

	Session::put('auth', '');

	if(isset($_POST['email_id']) && isset($_POST['password'])) {
		$users = User::all();
		if(count($users) > 0) {
			foreach($users as $i => $user){
				if($user['email'] == $_POST['email_id'] && $user['password'] == md5($_POST['password'])) {
					Session::put('auth', [
						'id' => $i,
						'name' => $user['name'],
						'email' => $user['email'],
					]);
					break;
				}
			}
			if(!Session::auth())
				$msg = "Email and password couldn't matched";
			else
				redirect();
		}

	}
	get_header();
?>
<div class = "container">
	<div class="row">

	<div class="col-md-3"></div>
	<div class="col-md-6">

		<form action="<?= url("login") ?>" method="post" class = "login-form px-5 pb-5">
			
			<h3 class = "mb-2">Accounting Login</h3>

			<?php
				if($msg)
					echo "<div class = 'p-2 m-2 alert-danger'>{$msg}</div>";
			?>

			<label for="email_id">Email address</label>
			<input type="email" class = "form-control" name = "email_id" placeholder = "Email id" required>
			<label for="password">Password</label>
			<input type="password" class = "form-control" name = "password" placeholder = "password" required>

			<input type="submit" value="Submit" class = "mt-3 btn btn-primary">
		</form>

	</div>
	<div class="col-md-3"></div>

	</div>
</div>

<?php get_footer(); ?>