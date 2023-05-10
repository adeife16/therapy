<?php

require_once 'database.php';
session_start();

$db = new Database();
$unique = array();
$chats = array();

if(isset($_GET['chat_id']))
{
	$id = $_GET['chat_id'];

	$selectFields = array("user_msg", "bot_res");
	$whereField = "chat_id";
	$whereValue = $id;
	$orderByField = "date_created";
	$get_chat = $db->selectWhereAsc("chat", $selectFields, $whereField, $whereValue, $orderByField);

	if(count($get_chat) > 0)
	{
		foreach ($get_chat as $value)
		{
			array_push($chats, $value);
		}
		// print_r($get_chat);
		echo json_encode($get_chat);

	}

	exit();

}

$chat_ids = $db->selectDistinctWhere("chat", "chat_id", "user_id", $_SESSION['user_id']);

// print_r($chat_ids);

foreach ($chat_ids as $id)
{
	array_push($unique, $id['chat_id']);
	// $db->fetchWhere("chat", )
}
foreach($unique as $id)
{
	$chat = $db->fetchWhere("chat", "chat_id", $id, "chat_id, date_created");

	array_push($chats, $chat);
}

	echo json_encode($chats);
