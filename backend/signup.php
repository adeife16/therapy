<?php
require_once 'database.php';

if(isset($_POST['fname']) && $_POST['fname'] != "")
{
	$user_id = str_shuffle(substr(md5(time().mt_rand().time()), 0,20));
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$con_pass = $_POST['con-pass'];

	$date = date('Y-m-d');

	// confirm password

	if($password != $con_pass)
	{
		echo array("status" => 500, "data" => "Password Mismatch");
		exit;
	}

	$db = new Database();

	// encrypt password using password_hash()
	$password = password_hash($password, PASSWORD_DEFAULT);
	$data = array(
	'user_id' => $user_id,
    'first_name' => $fname,
    'last_name' => $lname,
    'email' => $email,
    'password' => $password
    );

	// create user
	$insert = $db->insert('user', $data);


	if($insert)
	{
		$json = array("status" => 200);

	}
	else
	{
		$json = array("status" => 500, "data" => "Server Error");
	}
	print json_encode($json);
}
