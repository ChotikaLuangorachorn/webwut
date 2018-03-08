<?php
	include("./config.php");
	session_start();
	// $uid = $_POST['username'];

	$statement = $connection->query('SELECT CURRENT_TIMESTAMP');
	$timestamp = $statement->fetchAll(PDO::FETCH_OBJ)[0]->CURRENT_TIMESTAMP;

	// echo $timestamp;

	$target_dir = "messageFile/";
	$fromID = "1";
	$toID = $_POST['toID'];
	$msg = $_POST['msg'];
	
	if(array_key_exists("file", $_FILES)){
		// echo "has file";

		// create file name 
		$target_file = $target_dir . $fromID . "-to-" . $toID . " " . $timestamp . "." . basename($_FILES["file"]["type"]);
		// replace char can't use
		$target_file =  str_replace(":", "-", $target_file);

		// $target_file = $target_dir . "sadsda" . "-" . basename($_FILES["file"]["name"]);
		// echo $target_file;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		// if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["file"]["tmp_name"]);
	    if($check !== false) {
	        // echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        // echo "File is not an image.";
	        $uploadOk = 0;
	    }

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk !== 0) {

    		if ($toID!="" && $msg!=""){
				$query = $connection->exec(
					"INSERT INTO personal_message (`fromID`, `toID`, `message`, `filePath`, `timestamp`) VALUES ('$fromID', '$toID', '$msg', '$target_file', '$timestamp')");

// INSERT INTO `personal_message`(`fromID`, `toID`, `message`, `filePath`, `timestamp`) 
// VALUES ((select id from user where userID="fromUserID"),(select id from user where userID="toUserID"),
//     "message","filepath",CURRENT_TIMESTAMP)
				if ($query){
					echo "true";
					// save file to folder + upload image
					move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
				} else{
					echo "false";
				}
			} else{
				echo "not ID or Msg";
			}
		}
	}else {
		// echo "has not file";

	    if ($toID!="" && $msg!=""){
			$query = $connection->exec(
				"INSERT INTO personal_message (`fromID`, `toID`, `message`, `filePath`, `timestamp`) VALUES ('$fromID', '$toID', '$msg', '', '$timestamp')");
// INSERT INTO `personal_message`(`fromID`, `toID`, `message`, `filePath`, `timestamp`) 
// VALUES ((select id from user where userID="fromUserID"),(select id from user where userID="toUserID"),
//     "message","filepath",CURRENT_TIMESTAMP)
			if ($query){
				echo "true";
			} else{
				echo "false";
			}
		} else{
				echo "not ID or Msg";
		}
	}
?>