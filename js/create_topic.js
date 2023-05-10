$(document).ready(function(){
	$('#content').summernote({
		minHeight: 300
	});

	$("#submit").click(function(elem){
		elem.preventDefault();
		let topic = $("#topic").val();
		let content = $("#content").summernote('code');
		if(topic == "" || content == ""){
			alert_failure("Fill all fields");
		}
		else{
			let newTopic = {
				topic: topic,
				content: content
			}
			$.ajax({
				type: 'POST',
				url: 'backend/forum.php',
				data:{
					newtopic: newTopic,
				}
			})
			.done((res) => {
				res = JSON.parse(res);
				if(res.stat == 200){
					alert_success("Topic Created");
					setTimeout(function() {
					window.location.reload();						
					}, 2000);
				}
			})
			.fail(() => {
			
			})
		}
		});
})