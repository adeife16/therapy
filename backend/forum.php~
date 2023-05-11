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


if(isset($_POST['newtopic']))
{
	$new_topic = $_POST['newtopic'];

	$topic = $new_topic['topic'];
	$content = $new_topic['content'];

		// generate post id
	$topic_id = str_shuffle(substr(md5(time().mt_rand().time()), 10,20));

	$data = array(
		"topic_id" => $topic_id,
		"topic_name" => $topic,
		"content" => $content,
		"user_id" => $_SESSION['user_id']
	);
	$post = $db->insert("forum", $data);

	if($post)
	{
		echo json_encode(array("stat" => 200));
	}
	exit();
}

if(isset($_GET['gettopics']))
{

$selectFields = array('forum.*', 'user.first_name', 'user.last_name', 'user.picture');
$fromTable = 'forum';
$joinStatements = array(
    'INNER JOIN user ON forum.user_id = user.user_id',
);
$topics = $db->selectJoin($selectFields, $fromTable, $joinStatements);

	if(count($topics) > 0)
	{
		echo json_encode(array("stat" => 200, "data" => $topics));
	}
	exit();
}


if(isset($_GET['getcontent']))
{
	$id = $_GET['getcontent'];

	$stmt = $dsn->prepare("SELECT f.*, u.first_name, u.last_name, u.picture FROM forum f, user u WHERE f.user_id = u.user_id AND f.topic_id = :topic");
	$stmt->bindParam(":topic", $id);
	$stmt->execute();

	$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);



	if(count($topics) > 0)
	{
		echo json_encode(array("stat" => 200, "data" => $topics));
	}
	exit();

	if(count($content) > 0)
	{
		echo json_encode(array("stat" => 200, "data" => $content));
	}
}