<?php
$pageTitle = "Blog";
include 'views/includes/header.php';

?>
<div class="container">
	<div class="row">
				<div class="col-md-2">
					<a href="index.php" class="btn btn-info">Blog</a>					
				</div>
			</div>
	<div class="row">
		<div class="col-lg-5 col-md-8 mx-auto">
			<form class="bs-component" method="POST" action="verify.php">
				<frameset>
					<h2>Admin Login</h2>
					<div class="form-group">
						<label>User name:</label>
						<input type="text" class="form-control" name="username">
						<label>Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Send">
						<input type="reset" name ="reset" value="Reset">
					</div>
				</frameset>
			</form>	
		</div>			
	</div>		
</div>
<?php
include 'views/includes/footer.php';

