<?php
	$title = "Chatbot Session";
	require_once 'header.php';
?>
<!DOCTYPE html>
  <div class="container gradient-custom mt-5">
    <h1 class="mb-4 text-white	">Chatbot Session</h1>
    <div class="card mask mask-custom">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div id="chat" class="chat "></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <input type="text" id="message" class="form-control input mask-custom" placeholder="Type your message...">
          </div>
          <div class="col-md-2">
            <button id="send" class="btn btn-primary btn-block">Send</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
<?php 
	require_once 'footer.php';
?>