<?php
	$title = "Chat History";
	require_once 'header.php';
		if (!isset($_SESSION['user_id']))
	{
		header('Location: login.php');
	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-3">
					<div class="history p-3 mb-5 bg-white">
						
					</div>
				</div>
				<div class="col-md-9">
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="viewport p-3 gradient-custom" id="viewport">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>



<?php 
	require_once 'footer.php';
?>