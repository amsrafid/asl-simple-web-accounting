<?php get_header();	?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php get_nav(); ?>


		</div>
		<div class="col-md-8">
			<h3 class = "pt-4 pb-4">All Account</h3>
		<?php
			$all =Account::all(); 
			if($all) {
				?>
			<table class="table table-stripe">
				<tr>
					<th>#</th>
					<th>Number</th>
					<th>Name</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Balance</th>
					<th>Action</th>
				</tr>
				<?php
				$i = 1;
				foreach( $all as $a ) {
					?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $a['number'] ?></td>
						<td><?= $a['name'] ?></td>
						<td><?= $a['age'] ?></td>
						<td><?= $a['phone'] ?></td>
						<td><?= number_format($a['balance']) ?></td>
						<td>
							<a href="<?= url('account/view/?number='.$a['number']); ?>" class = "btn-sm btn-info">view</a>
							<a href="<?= url('account/create/?number='.$a['number']); ?>" class = "btn-sm btn-success">edit</a>
							<a href="<?= url('account/all/?number='.$a['number']); ?>" class = "btn-sm btn-danger">delete</a>
						</td>
					</tr>
					<?php
					$i++;
				}
				?>
			</table>
				
				<?php
			} else
				echo "No account is created yet.";
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>