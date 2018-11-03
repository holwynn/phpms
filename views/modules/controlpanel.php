	<div class="container shadow bg">
		<div class="row">
			<div class="col-lg-12col-xs-12 login-module">
				<h3>Welcome, <?php echo $_SESSION['ACCOUNT_USERNAME']; ?></h3>
				<ul class="list-inline text-center">
					<li><button class="btn btn-success">Vote</button></li>
					<li><a href="/?logout"><button class="btn btn-danger">Logout</button></a></li>
					<li></li>
				</ul>
				<div class="character-container">
				<?php foreach ($characters as $character): ?>
					<div class="character-box shadow">
						<img src="/assets/images/jobs/<?php echo $character->job ?>.png" alt="">
						<p>Character: <?php echo $character->name ?></p>
						<p>Level: <?php echo $character->level ?> (<?php echo $character->exp ?> exp)</p>
						<p>Reborns: <?php echo $character->reborns ?></p>
						<a href="/cp/mapfix.php?id=<?php echo $character->id ?>">Map fix</a>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
