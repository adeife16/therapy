$(document).ready(function(){
	getChats();
})

function getChats(){
	$.ajax({
		type: 'GET',
		url: 'backend/history.php',
		dataType: 'json'
	})
	.done((res) => {
		showChats(res);
	})
	.fail(() => {
	
	})
			
}

function showChats(res){
	for(let i in res){
		let dates = res[i][0].date_created;
		let time = res[i][0].date_created.split(' ')[1];

		$(".history").append(`
			<div class="history-div p-3 m-2" id="`+res[i][0].chat_id+`">
				<a href="#" class="history-link">
					<h5>Chat Session</h5>
					<p>Created on `+dateFormat(dates)+`</p>
					<p>Time `+time+`</p>
				</a>
			</div>
		`)

	}
}



function dateFormat(dates){
	var date = new Date(dates);
	var readable_date = date.toDateString();
	return readable_date;
}

$(document).on('click', '.history-div', function(){
	let id = $(this).attr('id');
	$.ajax({
		type: 'GET',
		url: 'backend/history.php?chat_id='+id,
		// dataType: 'json',
	})
	.done(function(res){
		res = JSON.parse(res);
		showHistory(res)
	});
	
});

function showHistory(res){
	const view = $("#viewport");
	$(view).html("");
	for(let i in res){
		view.append(`<div class="row justify-content-start">
			<div class="col-md-6"><div> <h6>You</h6></div><div class="alert float-left user-msg" role="alert"><p>` + res[i].user_msg +`</p></div></div></div>`)
		view.append('<div class="row justify-content-end"><div class="col-md-6"><div><h6 class="text-right">Bot</h6></div><div class="alert float-right bot-msg" role="alert"><p>' + res[i].bot_res + '</p></div></div></div>')
	}
}