			<div class="col-lg-9 col-sm-9 col-xs-12">
				<h2>Register</h2>
				<div class="register">

					<?php print $errors; ?>

					<form method="POST" action="/?register">
					  <div class="form-group">
					  	<label for="username">Username</label>
					    <input type="text" name="username" class="form-control" value="<?php echo $this->getUsername(); ?>" placeholder="Username">
					  </div>
					  <div class="form-group">
					  	<label for="password">Password</label>
					    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
					  </div>
					  <div class="form-group">
					  	<label for="password_confirm">Confirm Password</label>
					    <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password">
					  </div>
					  <div class="form-group">
					  	<label for="email">Email</label>
					    <input type="email" name="email" id="email" class="form-control" value="<?php echo $this->getEmail(); ?>" placeholder="Email">
					  </div>
					  <div class="form-group">
					  	<label for="birthday">Birthday</label>
					    <input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo $this->getBirthday(); ?>" placeholder="Birthday">
					  </div>
					  <button type="submit" class="btn btn-default">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>