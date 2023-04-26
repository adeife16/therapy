$(document).ready(function(){
	getStates()	
	getProfile();
})

$('#update').click(function(){
	updateProfile();
});

// update profile
function updateProfile(){
  let formdata = new FormData(document.getElementById('profile-form'));
  		  $.ajax({
		    url: 'backend/profile.php',
		    type: 'POST',
		    processData: false,
		    contentType: false,
		    cache: false,
		    data: formdata,
		    beforeSend: function(){
		      $("#update").attr("disabled", "disabled");
		    }
		  })
		  .done(function(res){
		    $("#update").removeAttr("disabled");
		    console.log(res);
		    let data = JSON.parse(res);
		    if(data.status === 200){
		    	alert_success("Profile Updated!");
		    	setTimeout(() =>{
		    		getProfile();
		    	}, 1000);
		      }
		    else{
		      alert_failure("An error occured, please try again!");
		    }
		  })
		  .fail(function() {
		    alert_failure("Server Error!");
		  })

}

// get profile details
function getProfile(){
	$.ajax({
		type: 'GET',
		url: 'backend/profile.php?getProfile'
	})
	.done((res) => {
		res = JSON.parse(res);
		if(res.status == 200){
			showProfile(res.data[0]);
		}
		// console.log(res);
	})
	.fail(() => {
	
	})
			
}

// upload picture
function uploadPicture(){
    let formdata = new FormData(document.getElementById('picture-form'));
    $.ajax({
      url: 'backend/profile.php',
      type: 'POST',
      processData: false,
      contentType: false,
      cache: false,
      data: formdata
	})
	.done((res) => {
		res = JSON.parse(res);
		if(res.status == 200){
			alert_success("Profile picture has been uploaded!");
			getProfile();
			$("#pictureModal").click();
		}
		else if(res.status == 500){
			alert_failure("An error occured while uploading!");
		}
		else{

		}
	})
	.fail(() => {
	
	})
			
}

// show profile details
function showProfile(data){
	let sessionId = sessionStorage.getItem('user_id')
	for(item in data){
		if(item == null || item == ""){
			item = "";
		}
	}
	let profilePic = 'img/users/'+data.picture;
	$("#profile-image").attr('src', profilePic+ "?" +new Date().getTime());
	$(".display-pic").attr('src', profilePic+ "?" +new Date().getTime());
	$("#fname").val(data.first_name);
	$("#lname").val(data.last_name);
	$("#email").val(data.email);
	$("#about").val(data.about);
	// $("#address").val(data.address);

    setTimeout(function(){
  		$("#state option[value="+data.location+"]").attr('selected','selected');
	},3000);
}

// get states
function getStates(){
	$.ajax({
		type: 'GET',
		url: 'backend/location.php?getState=all'
	})
	.done((res) => {
		res = JSON.parse(res);
		if(res.status == 200){
			showStates(res.data)
		}
		// console.log(res);
	})
	.fail(() => {
	
	})
			
}


// show states dropdown
function showStates(data){
	$("#state").html(`<option value="">Select State</option>`);
	for (var i = 0; i < data.length; i++) {
	  $("#state").append(`
	    <option value="`+data[i].id+`">`+data[i].state_name+`</option>
	    `)
	}
}



// picture preview
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var file_size = input.files[0].size;
    var allowed_ext = ['png','jpg','jpeg','PNG','JPG','JPEG'];
    reader.onload = function(e) {
      if($.inArray(file_type, allowed_ext) != -1){
	      if(file_size <= 1000000){
		      $('.display-pic').attr('src', e.target.result);
		      $('.display-pic').fadeIn(500);
	      }
	      else{
	      	alert_failure("Picture size exceeds 1 megabytes");
	      }
	    }
	    else{
	    	alert_failure("Only png and jpg files are allowed");
	    }
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$('#upload-input').change(function(){
  readURL(this);
})

//upload picture
$("#submit-picture").click(function(){
	uploadPicture();
})