<?php
	get_header();
	$msg = Arr::has($_GET, 'msg');
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php get_nav(); ?>
		</div>
		<div class="col-md-8">
			<h3 class = "pt-4 pb-4">All Withdraw</h3>
			<?php echo $msg ? '<div class="alert alert-info">'.$msg.'</div>' : ''; ?>
		<?php
			$account = Account::all();
			$all = Withdraw::all();
			if($all) { ?>
			<table class="table table-stripe">
				<tr>
					<th>#</th>
					<th>Number</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Amount</th>
					<th>Date</th>
				</tr>
				<?php
				$i = 1;
				foreach( $all as $a ) {
					?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $a['number'] ?></td>
						<td><?= $account[$a['number']]['name'] ?></td>
						<td><?= $account[$a['number']]['phone'] ?></td>
						<td><?= number_format($a['amount']) ?></td>
						<td><?= beautifyDate($a['date']) ?></td>
					</tr>
					<?php
					$i++;
				} ?>
			</table>
				<?php
			} else
				echo "No withdraw is created yet.";
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>