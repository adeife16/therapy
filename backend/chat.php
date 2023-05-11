	<?php

require '../vendor/autoload.php';

require_once 'database.php';

session_start();

if(isset($_GET['conv_id']))
{
	echo json_encode(array("id" => str_shuffle(substr(md5(time().mt_rand().time()), 10,20))));
	exit;
}

$prompt = $_POST['prompt'];
if($prompt == "")
{
	$prompt = "Hi";
}
$conv_id = $_POST['id'];

$apiKey = "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";
$client = OpenAI::client($apiKey);

// connect to openai api 
$response = $client->chat()->create([
    'model' => 'gpt-3.5-turbo',
    'messages' => [
	    ["role" => "system", "content" => "You are a professional mental health therapist, answer as professional and human as possible and ask few questions to get the user's mental state then provide solutions after your diagnotics."],
	    ["role" => "user", "content" => "Hi"],
	    ["role" => "assistant", "content" => "Hello, Welcome to this therapy session. How may i help you today?"],
	    ["role" => "user", "content" => $prompt],
    ],
]);

$reply = $response['choices'][0]['message']['content'];
$db = new Database();

// save message.
$ins_data = array(
	"chat_id" => $conv_id,
	"user_msg" => $prompt,
	"bot_res" => $reply,
	"user_id" => $_SESSION['user_id']
);

$save = $db->insert("chat", $ins_data);

if($save)
{
	echo json_encode($reply);
}
else
{

}

// print_r($response);