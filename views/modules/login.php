	<div class="container shadow bg">
		<div class="row">
			<div class="col-lg-12col-xs-12 login-module">
				<h2>Login area</h2>
				<div>
					<p><?php echo $errors; ?></p>
					<form method="POST" action="/?login">
					  <div class="form-group">
					  	<label for="username">Account</label>
					    <input type="text" name="username" id="username" class="form-control" placeholder="Account">
					  </div>
					  <div class="form-group">
					  <label for="password">Password</label>
					    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-default">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
