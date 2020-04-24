<?php
$number = $_GET['number'];

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php get_nav(); ?>
		</div>
		<div class="col-md-6">
			<h3 class="pt-4 pb-4">Account Details</h3>
			<div>
				<?php
				$acc = Account::find($number);
				if($acc){
					?>
					<table class="table-table-stripe">
						<tr>
							<th>Account Number</th>
							<td class = "pl-5"><?= $acc['number']; ?></td>
						</tr>
						<tr>
							<th>Name</th>
							<td class = "pl-5"><?= $acc['name']; ?></td>
						</tr>
						<tr>
							<th>Age</th>
							<td class = "pl-5"><?= $acc['age']; ?></td>
						</tr>
						<tr>
							<th>Phone number</th>
							<td class = "pl-5"><?= $acc['phone']; ?></td>
						</tr>
						<tr>
							<th>Balance</th>
							<td class = "pl-5"><sup>৳</sup><?= number_format($acc['balance']); ?></td>
						</tr>
					</table>
					<?php
				} else
					echo "No account is created with this number.";
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>