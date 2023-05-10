<?php
session_start();

$session_id = $_SESSION['user_id'];
require_once 'database.php';

$data = array();
$today = date('Y-m-d');

$db = new Database();
// get profile details
if(isset($_GET['getProfile']))
{


	$selectFields = array('*');
	$whereClauses = array(
	    array('field' => 'user_id', 'operator' => '=', 'value' => $session_id)
	);	
	$profile = $db->selectWhere('user', $selectFields, $whereClauses);

	if(count($profile) == 1)
	{
		foreach ($profile as $val) {
			unset($val['password']);
			array_push($data, $val);
		}
		$json = array("status" => 200, "data" => $data);
	}
	else
	{
		$json = array("status" => 500);
	}

	echo json_encode($json);
}

// update profile details
if(isset($_POST['fname']) AND $_POST['fname'] != "")
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$state = $_POST['state'];
	$about = $_POST['about'];

	$updateFields = array("first_name", "last_name", "location", "about");
	$updateValues = array($fname, $lname, $state, $about);

	// update table
	$update = $db->updateWhere('user', $updateFields, $updateValues, 'user_id', $_SESSION['user_id']);
	// send respose
	if($update > 0)
	{
		$json = array("status" => 200);
	}
	else
	{
		$json = array("status" => 500);
	}

	echo json_encode($json);
}

// upload picture
if(isset($_FILES['picture']) AND $_FILES['picture'] != "")
{
	$picture = picture_upload('picture', $_SESSION['user_id']);
	if($picture == "success")
	{
        $tmp = explode('.',$_FILES['picture']['name']);
        $ext = strtolower(end($tmp));
        $pic = strval($session_id). '.' .$ext;

		$updateFields = array("picture");
		$updateValues = array($pic);

		$update = $db->updateWhere('user', $updateFields, $updateValues, 'user_id', $session_id);

		// if($update)
		// {
			$json = array("status" => 200);
		// }
	// 	else
	// 	{
	// 		$json = array("status" => 500);
	// 		// $json = array("status" => $update);
	// 	}
	}
	else
	{
		$json = array("status" => 500);
		// $json = array("status" => $picture);
	}
	echo json_encode($json);
}


// picture upload function
function picture_upload($filename, $user_id)
{
  $fold = '../img/users/';
  if (!file_exists($fold))
  {
    mkdir($fold, 0755);
  }
  $allowed_ext = ["jpg","jpeg","png"]; // These will be the only file extensions allowed
  $uploadDirectory = $fold.'/';
  $fileName = $_FILES[$filename]['name'];
  $fileSize =$_FILES[$filename]['size'];
  $fileTmpName =$_FILES[$filename]['tmp_name'];
  $file_type=$_FILES[$filename]['type'];
  $error = $_FILES[$filename]['error'];
  $tmp = explode('.',$fileName);
  $fileExtension=strtolower(end($tmp));
  $newName = $user_id . "." . $fileExtension;
  $uploadPath = $uploadDirectory . $newName;

  if ($fileSize > 1000000)
  {

    return "large";

  }

  elseif (!in_array($fileExtension, $allowed_ext))
  {
    return "invalid";
  }
  else
  {
    if ($error == 0)
    {

      if (move_uploaded_file($fileTmpName , $uploadPath))
      {
        return "success";
      }
      else
      {
        return $error ;
      }
    }
    else
    {
      return $error;
    }

  }

}