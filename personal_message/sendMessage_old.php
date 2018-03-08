<?php
	include("./config.php");

	$toID = $_POST['toID'];
	$msg = $_POST['msg'];
	$file = $_POST['file'];
	if ($toID!="" && $msg!=""){
		$query = $connection->exec("INSERT INTO personal_message (`fromID`, `toID`, `message`, `messageType`, `timestamp`) VALUES ('1', '$toID', '$msg', '$file', CURRENT_TIMESTAMP)");
		if ($query){
			echo "true";
		} else{
			echo "false";
		}
	} else{
			echo "";
	}


 ?>