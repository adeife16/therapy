$(document).ready(function(){

	$('#login').click(function(e){
		e.preventDefault();
		let email = $("#email").val();
		let pass = $("#pass").val();
		$.ajax({
			type: 'post',
			url: 'backend/login.php',
			data: {
				email: email,
				pass: pass
			},
			dataType: 'json'
		})
		.done((res) => {
		    if(res.status == 200){
		    	alert_success("Login Successful!");
			    setTimeout(() => {
			    	window.location.replace("index.php");
			    }, 2000)
		    }
		    else{
		    	alert_failure("Email or password is incorrect!");
		    }
		})
		.fail(() => {
		
		})
				
	});	
})