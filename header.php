<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Healing Haven</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
</head>
<body class="gradient-custom">
<div class="" style="margin-bottom: 100px;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.php">Healing Haven</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="session.php">Live Session<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
	        Chatbot
	    	</a>
	        <div class="dropdown-menu">
	          <a class="dropdown-item" href="chat.php">New Session</a>
	          <a class="dropdown-item" href="chat_history.php">Session History</a>
<!-- 	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a> -->
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-white" href="forum.php">Forum</a>
	      </li>
	    </ul>
	    <div>
	    	<div class="session">
	    		<ul class="navbar-nav mr-auto">
	    		<?php 
	    		if(isset($_SESSION['user_id'])){
	    		?>
			        <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
				        <i class="fa-solid fa-user"></i> <?php echo $_SESSION['name']; ?>
				    	</a>
				        <div class="dropdown-menu">
				          <a class="dropdown-item" href="profile.php">Profile</a>
				          <a class="dropdown-item" href="logout.php">Logout</a>
				        </div>
			        </li>
			    <?php 
			    	}
			    	else{
			     ?>
	    			<li>
			    		<a href="login.php"  class="text-white nav-link">Login</a>
	    			</li>
	    			<li>
	    				<a href="signup.php" class="text-white nav-link">Signup</a>	
	    			</li>
    			<?php  }?>
	    		</ul>
	    	</div>
	    </div>
	  </div>
	</nav>
