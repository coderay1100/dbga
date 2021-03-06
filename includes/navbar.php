		<nav class="navbar navbar-default" role="navigation">
		<div class="container">
		
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button> <a class="navbar-brand" href="#">Career Hub<sup>BETA</sup></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="student.php">Home</a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">University of Indonesia <strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="https://www.academic.ui.ac.id">SIAK-NG</a></li>
							<li><a href="http://www.scele.cs.ui.ac.id">SCELE</a></li>
							<li class="divider"></li>
							<li><a href="https://print.mhs.cs.ui.ac.id/">Student Printing Facility</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search here"/>
					</div> <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></button>
				</form>
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?> <strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="profile.php">Profile</a></li>
							<li><a href="addcv.php">CV</a></li>
							<li class="disabled"><a href="#">Settings</a></li>
							<li class="disabled"><a href="#">Help</a></li>
							<li class="divider"></li>
							<li><a href="logout.php">Sign out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div> <!-- /.container -->
		</nav>