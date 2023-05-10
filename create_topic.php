<?php 
	$title = "Create Topic";
	require_once 'header.php';

?>
<div class="row mt-5">
	<div class="col-md-12"><h1>Create Forum Topic</h1></div>
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="topic-div m-3 p-3">
					<form class="topic-form" action="" method="">
						<div class="form-group">
							<span>Topic</span>
							<input type="text" name="topic" class="form-control" id="topic" placeholder="Enter Forum Topic">
						</div>
						<div class="form-group">
							<span>Content</span>
							<textarea class="form-control" id="content" name="content">
								
							</textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-success" id="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	require_once 'footer.php';
?>