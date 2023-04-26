<?php  ?>
<div class="alert-box success"></div>
<div class="alert-box failure"></div>
<div class="alert-box warning"></div>
	<script type="text/javascript" src="assets/jquery.min.js"></script>
	<script type="text/javascript" src="assets/popper.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/fontawesome/js/all.min.js"></script>
	<script type="text/javascript" src="assets/notice.js"></script>
	<div class="footer bg-dark text-white p-3">
		<div class="row">
			<div class="col-md-6 color-white">
				<p class="copyright">
					<?php print date('Y') ?> © Healing Haven. All Rights Reserved.
				</p>
			</div>
			<div class="col-md-6">
				<div class="social">
					<ul class="social-icons">
						<li>
							<i class="fa-brands fa-twitter fa-lg"></i>
						</li>
						<li>
							<i class="fa-brands fa-instagram fa-lg"></i>
						</li>
						<li>
							<i class="fa-brands fa-facebook fa-lg"></i>
						</li>
						<li>
							<i class="fa-brands fa-linkedin fa-lg"></i>
						</li>
						<li>
							<i class="fa-brands fa-youtube fa-lg"></i>
						</li>
					</ul>
            	</div>
			</div>
		</div>
	</div>
</div>
<?php if ($title == "Signup Page"): ?>
	<script type="text/javascript" src="js/signup.js"></script>
<?php endif ?>

<?php if ($title == "Login Page"): ?>
	<script type="text/javascript" src="js/login.js"></script>
<?php endif ?>

<?php if ($title == "Profile Page"): ?>
	<script type="text/javascript" src="js/profile.js"></script>
<?php endif ?>
</body>
</html>