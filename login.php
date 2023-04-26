<?php 
	$title = "Login Page";
	require_once 'header.php';
?>
<div class="row justify-content-center m-5">
	<div class="col-md-6">
		<div class="container">
			<div class="login-div m-5">
				<form class="login-form p-4" id="login-form" method="post" action="">
					<h1>Sign In</h1>
					<div class="form-group">
						<span>Email</span>
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<span>Password</span>
						<input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password">
					</div>
					<div>
						<button type="button" id="login" class="btn btn-success">Sign In</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<?php
	require_once 'footer.php';
?>