<?php

require_once 'database.php';


$email = $_POST['email'];
$pass = $_POST['pass'];



$db = new Database();
$selectFields = array('*');
$whereClauses = array(
    array('field' => 'email', 'operator' => '=', 'value' => $email),
);

$check = $db->selectWhere('user', $selectFields, $whereClauses);



if(count($check) == 1)
{
	foreach($check as $data)
	{
		$user_id = $data['user_id'];
		$fname = $data['first_name'];
		$password = $data['password'];
	}

	if(password_verify($pass, $password))
	{
		// set session 
		session_start();

		$_SESSION['user_id'] = $user_id;
		$_SESSION['name'] = $fname;


		$json = array("status" => 200);
		// $data = array("user_id" => $user_id, "name" => $fname, "role" => $role);
	}
	else
	{
		$json = array("status" => 403);
	}
		echo json_encode($json);
}
else
{
	$json = array("status" => 403);
	echo json_encode($json);
}