<?php get_header();
	$msg = Arr::has($_GET, 'msg');

	if(isset($_GET['q'])) {
		if (User::delete($_GET['q']))
			redirect("user/all/?msg=User is deleted successfully");
		else
			redirect("user/all/?msg=User is not deleted");
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php get_nav(); ?>
		</div>
		<div class="col-md-8">
			<h3 class = "pt-4 pb-4">All Account</h3>
			<?php echo $msg ? '<div class="alert alert-info">'.$msg.'</div>' : ''; ?>
		<?php
			$all = User::all();
			if($all) { ?>
			<table class="table table-stripe">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
				<?php
				$i = 1;
				foreach( $all as $i => $a ) {
					?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $a['name'] ?></td>
						<td><?= $a['age'] ?></td>
						<td><?= $a['phone'] ?></td>
						<td><?= $a['email'] ?></td>
						<td><?= $a['address'] ?></td>
						<td>
							<a href="<?= url('user/create/?q='.$i); ?>" class = "btn-sm btn-success">edit</a>
							<a href="<?= url('user/all/?q='.$i); ?>" class = "btn-sm btn-danger">delete</a>
						</td>
					</tr>
					<?php
					$i++;
				} ?>
			</table>
				<?php
			} else
				echo "No account is created yet.";
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>