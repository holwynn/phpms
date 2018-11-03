			<div class="col-lg-9 col-sm-9 col-xs-12">
				<h2>Vote</h2>
				<p>You can vote every 6/12 hours</p>
				<form method="POST" action="/?vote">
					<select class="form-control" name="votepage" id="votepage">
						<option value="gtop100">GTop100</option>
						<option value="gtop100">XtremeTop</option>
					</select>

					<div class="form-group">
					    <label for="username">Username</label>
					    <input type="text" class="form-control" name="username" id="username" placeholder="Your username">
					</div>

					<button type="submit" class="btn btn-default">Vote</button>
				</form>
			</div>
		</div>
	</div>