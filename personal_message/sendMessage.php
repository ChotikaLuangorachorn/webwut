<?php
	include("./config.php");
	$statement = $connection->query('SELECT CURRENT_TIMESTAMP');
	$timestamp = $statement->fetchAll(PDO::FETCH_OBJ)[0]->CURRENT_TIMESTAMP;

	// echo $timestamp;

	$target_dir = "messageFile/";
	$fromID = "1";
	$toID = $_POST['toID'];
	$msg = $_POST['msg'];
	
	if(array_key_exists("file", $_FILES)){
		// echo "has file";

		$target_file = $target_dir . $fromID . "-to-" . $toID . " " . $timestamp . "-." . basename($_FILES["file"]["type"]);

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
		// }

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

	    		if ($toID!="" && $msg!=""){
				$query = $connection->exec(
					"INSERT INTO personal_message (`fromID`, `toID`, `message`, `filePath`, `timestamp`) VALUES ('$fromID', '$toID', '$msg', '$target_file', '$timestamp')"
				);
				if ($query){
					echo "true";
				} else{
					echo "false";
				}
				} else{
						echo "not ID or Msg";
				}

		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}
	}else {
		// echo "has not file";

	    if ($toID!="" && $msg!=""){
		$query = $connection->exec(
			"INSERT INTO personal_message (`fromID`, `toID`, `message`, `filePath`, `timestamp`) VALUES ('$fromID', '$toID', '$msg', '', '$timestamp')"
		);
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