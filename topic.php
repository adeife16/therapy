<?php 
	$title = "Forum Topic";
	require_once 'header.php';
?>
<div class="row m-5">
	<div class="col-md-12"></div>
</div>
<div class="container">
	<div class="card">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="topic-details p-3">

				</div>
			</div>

		</div>
	</div>
	<div>
		<h1>Comments</h1>
	</div>
	<div class="card mt-4">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="comment-list">
				</div>
			</div>
		</div>
	</div>
	<div class="card mt-5 p-3">
		<div class="card-heading">
			<h2>Leave a Comment</h2>
		</div>
		<div class="card-body">
			<form class="comment-form" id="comment-form" action="" method="post">
				<div class="form-group">
					<textarea class="form-control" id="comment" name="comment"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-success" id="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
	require_once 'footer.php';
?>