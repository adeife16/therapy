$(document).ready(function(){
	$('#signup').click(function(e){
		e.preventDefault();
    	let formdata = new FormData(document.getElementById('signup-form'));
    	$.ajax({
    		type: 'post',
    		url: 'backend/signup.php',
		    processData: false,
		    contentType: false,
		    cache: false,
		    data: formdata,
		    dataType: 'json'
    	})
    	.done((res) => {
    		if(res.status == 200){
    			alert_success("Registeration Successful");

    			setTimeout(() =>{
    				window.location.replace("login.php");
    			},2000);
    		}
    		else{
    			alert_failure(res.data);
    		}
    	})
    	.fail(() => {
    	
    	})
    			
		});	
})