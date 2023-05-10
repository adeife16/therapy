<?php
 require_once 'database.php';

 $data = array();

 $db = new Database();

 if(isset($_GET['getTherapist']))
 {
 	$stmt = $db->fetch('therapist');

 	if(count($stmt) > 0)
 	{
 		$json = array("status" => 200, "data" => $stmt);
 	}
 	else
 	{
 		$json = array("status" => 500);
 	}
 	echo json_encode($json);
 }

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    echo "Here";
}
