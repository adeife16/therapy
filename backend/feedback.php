<?php
require_once 'database.php';

$db = new Database();

// enquiry
if(isset($_POST['feedback']) AND $_POST['feedback'] != "")
{
	$name = $_POST['feedback'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];

	$data = array(
		"name" => $name,
		"email" => $email,
		"message" => $msg
	);
	$insert = $db -> insert("feedback", $data);

	if($insert)
	{
		$json = array("stat" => 200);
	}
	else
	{
		$json = array("stat" => 500);
	}

	echo json_encode($json);
}