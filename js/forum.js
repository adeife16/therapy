$(document).ready(function(){
	getTopics();

	showSideTopics();
})

function getTopics(){
	$.ajax({
		type: 'GET',
		url: 'backend/forum.php?gettopics',
	})
	.done((res) => {
		res = JSON.parse(res);
		console.log(res);
		showTopics(res.data);
	})
	.fail(() => {
	
	})
}

function showTopics(data){
	$(".topic-list").html("");
	for(let i in data){
		$(".topic-list").append(`
			<div class="topic-div mt-4 p-2">
				<div class="row">
					<div class="col-md-4">
						<div class="topic-img">
							<img src="img/family.jpg">
						</div>
					</div>
					<div class="col-md-8">
					<div class="topic-details">
						<h4>`+data[i].topic_name+`</h4>
						<div class="topic-desc">
							`+data[i].content+`
						</div>
						<br>
						<p class="float-left"><i class="fa fa-calendar-days"></i> `+dateFormat(data[i].date_created)+`</p> <p class="float-right"><a href="topic.php?id=`+data[i].topic_id+`" class="color-green">Read More...</a></p>
					</div>
					</div>
				</div>
			</div>
		`)
	}
}

function showSideTopics(){
	$.ajax({
		type: 'GET',
		url: 'backend/forum.php?gettopics',
	})
	.done((res) => {
		res = JSON.parse(res);
		$(".side-list").html("");
		for(let i in res.data){
			if(i > 5){
				break;
			}
			$(".side-list").append(`
				<div class="side-div mt-4">
					<img src="img/family.jpg">
					<h3 class="text-center m-2">`+res.data[i].topic_name+`</h3>
				</div>
			`)
		}
	})
	.fail(() => {
	
	})
}

function dateFormat(dates){
	var date = new Date(dates);
	var readable_date = date.toDateString();
	return readable_date;
}

