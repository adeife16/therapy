let url = window.location.href;
let topicId = url.split('=')[1];
$(document).ready(function(){
	getContent(topicId);

	getComments(topicId);
})

function getContent(id){
	$.ajax({
		type: 'GET',
		url: 'backend/forum.php?getcontent='+id,
		
	})
	.done((res) => {
		res = JSON.parse(res)
		showContent(res.data);
	})
	.fail(() => {
	
	})
			
}


function showContent(data){
	data = data[0];
	$(".topic-details").html(`
		<div class="row">
			<div class="col-md-12">
				<img src="img/users/`+data.picture+`" class="topic-img">
				<span class="fa-lg">`+data.first_name+` `+data.last_name+`</span>
			</div>
			<div class="col-md-6">
				<div class="float-left">
					<h3>`+data.topic_name+`</h3>
				</div>
			</div>
			<div class="col-md-6">
				<div class="float-right">
					<strong>`+dateFormat(data.date_created)+`</strong>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="content mt-3 p-4">`+data.content+`</div>
			</div>
		</div>
	`)
}

function getComments(id){
	$.ajax({
		type: 'GET',
		url: 'backend/comment.php?getcomments='+topicId,
	})
	.done((res) => {
		res = JSON.parse(res);
		console.log(res);
		showComments(res.data);
	})
	.fail(() => {
	
	})
			
}

function showComments(data){
	$(".comment-list").html("");
	for(let i in data){
		$(".comment-list").append(`
			<div class="comment-div p-3 m-3">
				<div class="row">
					<div class="col-md-3 com-details text-right">
						<img src="img/users/`+data[i].picture+`" class="topic-img">
						<div class="name-date">
							<span class="fa-md">`+data[i].first_name+` `+data[i].last_name+`</span>
							<br>
							<small>`+dateFormat(data[i].date_created)+`</small>
						</div>
					</div>
					<div class="col-md-8">
						<p>`+data[i].comment+`</p>
					</div>
				</div>
			</div>
		`)
	}
}

$("#submit").click(function(e){
	e.preventDefault();
	let comment = $("#comment").val();
	if(comment != ""){
		$.ajax({
			type: 'POST',
			url: 'backend/comment.php',
			data:{
				newcomment: comment,
				topic: topicId
			}
		})
		.done((res) => {
			res = JSON.parse(res);
			if(res.stat == 200){
				alert_success("Comment posted");
				setTimeout(function() {
					window.location.reload();
				}, 2000);
			}
		})
		.fail(() => {
		
		})
				
	}
});

function dateFormat(dates){
	var date = new Date(dates);
	var readable_date = date.toDateString();
	return readable_date;
}
