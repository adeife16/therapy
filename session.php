<?php 
	$title = "Live Session";
	require_once 'header.php';
?>
<div class="row justify-content-center m-5">
	<div class="col-md-6">
		<div class="container">
			<div class="session-div m-5">
				<form class="session-form p-4" id="session-form" method="post" action="">
					<h1>Schedule Session</h1>
					<div class="form-group">
						<span>Therapist</span>
						<select class="form-control" name="therapist" id="therapist"></select>
					</div>
					<div class="form-group">
						<span>Date</span>
						<input type="date" name="date" id="date" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<span>Time</span>
						<input type="time" name="time" id="time" class="form-contarol" placeholder="">
					</div>
					<div class="form-group">
						<span>Notes</span>
						<textarea  name="notes" id="notes" class="form-control" placeholder="Note before the meeting"></textarea>
					</div>
					<div>
						<button type="button" id="submit" class="btn btn-success">Submit</button>
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