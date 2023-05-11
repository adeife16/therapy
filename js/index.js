$(document).ready(function(){
$('#submit').click(function(e){
		// e.preventDefault();
		let name = $("#name").val();
		let email = $("#email").val();
		let message = $("#message").val();
	
		if(name != "" || email != "" || message != ""){
				$.ajax({
					type: 'POST',
					url: 'backend/feedback.php',
					data: {
						feedback: name,
						email: email,
						msg: message
					},
					dataType: 'json'
				})
				.done((res) => {
					if(res.stat == 200){
						alert_success("Your message has been sent successfully");
						$(".form")[0].reset();
					}
				})
				.fail(() => {
					alert_failure("Error");
				})
		}	
	})
})