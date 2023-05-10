 $.ajax({
 	type: 'GET',
 	url: 'backend/chat.php?conv_id',
 	dataType: 'json'
 })
 .done((res) => {
 	sessionStorage.clear();
 	sessionStorage.setItem("conv_id", res.id);
 })
 .fail(() => {
 
 })
 		
 $(document).ready(function() {
      // Set up event handler for send button
      $('#send').click(function() {
        const message = $('#message').val();
        sendMessage(message);
        $('#message').val('');
      });

      setTimeout(() =>{
      	init();
      },2000)
    });

function sendMessage(message) {
const chat = $('#chat');
const id = sessionStorage.getItem("conv_id");
// Add user message to chat window
const userMessage = $('<div class="row"><div class="col-md-10"><div class="alert user-msg" role="alert">' + message + '</div></div></div>');
chat.append(userMessage);

// Send message to server
$.ajax({
    url: 'backend/chat.php',
    type: 'POST',
    data: { 
    	prompt: message,
    	id: id
    },
    dataType: 'json',
    beforeSend: function(){
    	chat.append('<div class="alert float-right bot-msg" id="load" role="alert">...</div>')
    }
	})
    .done(function(response) {
    	$("#load").remove();
    // Add chatbot response to chat window
    // console.log(response)
    const chatbotMessage = $('<div class="row"><div class="col-md-10 offset-md-2"><div class="alert float-right bot-msg" role="alert">' + response + '</div></div></div>');
    chat.append(chatbotMessage);
    });
}
// initialize chatbot
function init(){
const chat = $('#chat');

const id = sessionStorage.getItem("conv_id");

$.ajax({
    url: 'backend/chat.php',
    type: 'POST',
    data: { 
    	prompt: "",
    	id: id
    },
    dataType: 'json',
    beforeSend: function(){
    	chat.append('<div class="alert float-right bot-msg" id="load" role="alert">...</div>')
    }
	})
    .done(function(response) {
    	$("#load").remove();
    // Add chatbot response to chat window
    const chatbotMessage = $('<div class="row"><div class="col-md-10 offset-md-2"><div class="alert float-right bot-msg" role="alert">' + response + '</div></div></div>');
    chat.append(chatbotMessage);
    });	
}