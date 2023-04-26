<?php 
	$title = "Signup Page";
	require_once 'header.php';
?>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="container">
			<div class="signup-div m-5">
				<form class="signup-form p-4" id="signup-form" method="post" action="">
					<h1>Sign Up</h1>
					<div class="form-group">
						<span>First Name</span>
						<input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name" required>
					</div>
					<div class="form-group">
						<span>Last Name</span>
						<input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name" required>
					</div>
					<div class="form-group">
						<span>Email</span>
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
					</div>
					<div class="form-group">
						<span>Password</span>
						<input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password" required>
					</div>
					<div class="form-group">
						<span>Confirm Password</span>
						<input type="password" name="con-pass" id="con-pass" class="form-control" placeholder="Confirm Password">
					</div>
					<div>
						<button type="button" class="btn btn-success" id="signup">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	require_once 'footer.php';
?>