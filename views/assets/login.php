	<div class="container shadow bg">
		<div class="row user-side-panel">
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<h2>User Area</h2>
				<div class="login">
					<form method="POST" action="/?login">
					  <div class="form-group">
					  	<label for="username">Account</label>
					    <input type="text" name="username" id="username" class="form-control" placeholder="Account">
					  </div>
					  <div class="form-group">
					  <label for="pass">Password</label>
					    <input type="password" name="password" nid="username" class="form-control" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-default">Login</button>
					</form>
					</div>
				<ul class="list-unstyled">
					<li>Exp: <?php echo EXP; ?>x</li>
					<li>Drop: <?php echo DROP; ?>x</li>
					<li>Mesos: <?php echo MESOS; ?>x</li>
				</ul>
			</div>
