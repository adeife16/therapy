<?php 
	$title = "Profile Page";
	require_once 'header.php';
	// user access control
	session_start();
	if (!isset($_SESSION['user_id']))
	{
		header('Location: index.php');
	}
?>
	<style>
	    .display-pic{
	        width: 200px;
	        height: 200px;
	        border-radius: 10px!important;
	    }
	    .upload-btn-wrapper {
	      position: relative;
	      overflow: hidden;
	      display: inline-block;
	      /* left: 70px; */
	      top: 30px;
	    }

	    .upload-btn {
	      border: 0;
	      padding: 8px 20px;
	      border-radius: 8px;
	      font-size: 20px;
	      font-weight: bold;
	    }

	    #upload-input{
	    opacity: 0;
	    position: absolute;
	    left: 17px;
	    font-size: 25px;

	    }
	</style>
	<div class="row justify-content-center mt-3">
		<div class="col-md-12">
			<h1 class="text-center">Edit Profile</h1>
		</div>
	</div>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="profile-div mt-4">
			<div class="row justify-content-center">
				<div class="col-md-8 p-2 mt-3">
					<div class="picture-div">
						<img src="img/user.png" class="profile-image m-2" id="profile-image">
						<button class="btn color-white green" data-toggle="modal" data-target="#pictureModal">Change Picture</button>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<form class="profile-form " id="profile-form" method="post" action="">
						<div class="form-group">
							<span for="fname">First Name</span>
							<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
						</div>
						<div class="form-group">
							<span for="lname">Last Name</span>
							<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
						</div>
						<div class="form-group">
							<span for="email">Email Address</span>
							<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" readonly disabled>
						</div>
						<div class="form-group">
							<span for="about">About</span>
							<textarea name="about" id="about" class="form-control" placeholder="Write briefly about yourself"></textarea>
						</div>
						<div class="form-group">
							<span for="state">Location</span>
							<select class="form-control" name="state" id="state">
								
							</select>
						</div>
						<div class="form-group">
							<button class="btn color-white green" id="update">Update Profile</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="display:flex; flex-direction: column; align-items: center;">
      	<div class="preview-div">
      		<img class="display-pic" src="img/user.png">
      	</div>
        <form class="picture-form" id="picture-form" action="" method="post">
	      	<div class="upload-btn-wrapper ml-10">
	          <button class="upload-btn btn orange color-white">Change Picture</button>
	          <input type="file" name="picture" id="upload-input">
	        </div>
        </form>
      </div>
      <div class="modal-footer">
	          <button class="btn green color-white" id="submit-picture">Upload</button>
      </div>
    </div>
  </div>
</div>
<?php 
	require_once 'footer.php';
?>