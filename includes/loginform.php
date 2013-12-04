		<div class="container" id="page">
			<form class="form-horizontal" id="loginForm" role="form" action="login.php" method="post">
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10"><h2>Log In</h2><span><?php echo $message; ?></span></div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-5">
						<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-5">
						<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<button type="submit" class="btn btn-info">Sign in</button>
					</div>
				</div>
			</form>
		</div>