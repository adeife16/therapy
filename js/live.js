$(document).ready(function(){
	getTherapist();
})

function getTherapist(){
	$.ajax({
		type: 'get',
		url: 'backend/live.php?getTherapist',
		dataType: 'json'
	})
	.done((res) => {
		showTherapist(res.data);
	})
	.fail(() => {
	
	})
			
}


function showTherapist(data){
	$("#therapist").html(`<option>Select Therapist</option>`);

	for(let i in data){
		$("#therapist").append(`
			<option value="`+data[i].id+`">`+data[i].therapist_name+`</option>
		`)
	}
}

$('#submit').click(function(){
  let formdata = new FormData(document.getElementById('session-form'));
  $.ajax({
  	type: 'post',
  	url: 'backend/live.php',
    processData: false,
    contentType: false,
    cache: false,
    data: formdata,
    beforeSend: function(){
      $("#submit").attr("disabled", "disabled");
    }
  })
  .done((res) => {
  	$("#submit").removeAttr("disabled");
  	res = JSON.parse(res);
  	if(res.status == 200){
  		alert_success("Schedule Successful")
  	}
  })
  .fail(() => {
  
  })
  		
});