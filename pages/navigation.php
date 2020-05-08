<nav class = "sidebar-navigation">

	<ul>
		<li><a href="<?= url() ?>">- Home</a></li>
		<li><a href="<?= url('account/create') ?>">- Account</a>
			<ul>
				<li><a href="<?= url('account/all') ?>">All Account</a></li>
			</ul>
		</li>
		<li><a href="<?= url('deposite/create') ?>">- Deposite</a>
			<ul>
				<li><a href="<?= url('deposite/all') ?>">All Deposite</a></li>
			</ul>
		</li>
		<li><a href="<?= url('withdraw/create') ?>">- Withdraw</a>
			<ul>
				<li><a href="<?= url('withdraw/all') ?>">All Withdraw</a></li>
			</ul>
		</li>
		<li><a href="<?= url('user/create') ?>">- User</a>
			<ul>
				<li><a href="<?= url('user/all') ?>">All User</a></li>
			</ul>
		</li>
	</ul>

</nav>