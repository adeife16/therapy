<?php 
	$title = "Forum Page";
	require_once 'header.php';
?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<h1 class="text-center">
			FORUM
		</h1>
	</div>
	<div class="col-md-12">
		<div class="float-right m-2">
			<button class="btn btn-success"><a class="text-white" href="create_topic.php">Create Topic</a></button>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="topic-list card mt-4 m-3 p-3 mb-5">
		</div>
	</div>
	<div class="col-md-4 card">
<!-- 		<div class="row justify-content-center">
			
		</div> -->
		<div class="side-list mt-4 card">
			<div class="side-div mt-4">
				<img src="img/family.jpg">
				<h3 class="text-center m-2">Topic</h3>
			</div>
			<div class="side-div mt-4">
				<img src="img/family.jpg">
				<h3 class="text-center m-2">Topic</h3>
			</div>
			<div class="side-div mt-4">
				<img src="img/family.jpg">
				<h3 class="text-center m-2">Topic</h3>
			</div>
			<div class="side-div mt-4">
				<img src="img/family.jpg">
				<h3 class="text-center m-2">Topic</h3>
			</div>
			<div class="side-div mt-4">
				<img src="img/family.jpg">
				<h3 class="text-center m-2">Topic</h3>
			</div>
			<div class="side-div mt-4">
				<img src="img/family.jpg">
				<h3 class="text-center m-2">Topic</h3>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-md-12">
		
	</div>
</div>
<?php 
	require_once 'footer.php';
?>