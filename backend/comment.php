<?php
require_once 'database.php';

$host = "localhost";
$username = "root";
$password = "";
$dbname = "therapy";

$dsn = "mysql:host=$host;dbname=$dbname;";
$dsn = new PDO($dsn, $username, $password);
$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();

$db = new Database();
if(isset($_POST['newcomment']))
{
	$comment = $_POST['newcomment'];
	$com_id = str_shuffle(substr(md5(time().mt_rand().time()), 10,20));
	$topic_id = $_POST['topic'];

	$data = array(
		"comment_id" => $com_id,
		"topic_id" => $topic_id,
		"comment" => $comment,
		"user_id" => $_SESSION['user_id']
	);

	$post = $db->insert('comments', $data);

	if($post)
	{
		echo json_encode(array("stat" => 200));
	}
	exit();
}

if(isset($_GET['getcomments']))
{
	$id = $_GET['getcomments'];
	$stmt = $dsn->prepare("SELECT c.*, u.first_name, u.last_name, u.picture FROM comments c, user u WHERE c.user_id = u.user_id AND c.topic_id = :topic");
	$stmt->bindParam(":topic", $id);
	$stmt->execute();

	$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);



	if(count($comments) > 0)
	{
		echo json_encode(array("stat" => 200, "data" => $comments));
	}
	exit();
}