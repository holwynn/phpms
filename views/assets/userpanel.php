	<div class="container shadow bg">
		<div class="row user-side-panel">
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<h2>User Area</h2>
				<div>
					<p>Welcome, <?php echo $_SESSION['ACCOUNT_USERNAME'] ?>!</p>
					<ul class="list-unstyled">
						<li><a href="/?controlpanel"><button class="btn btn-primary">Control Panel</button></a></li>
						<li><button class="btn btn-primary">Quick Fixes</button></li>
						<li><button class="btn btn-success">Vote</button></li>
						<li><a href="/?logout"><button class="btn btn-danger">Logout</button></a></li>
						<li></li>
					</ul>
				</div>
				<ul class="list-unstyled">
					<li>Exp: <?php echo EXP; ?>x</li>
					<li>Drop: <?php echo DROP; ?>x</li>
					<li>Mesos: <?php echo MESOS; ?>x</li>
				</ul>
			</div>
