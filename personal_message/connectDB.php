<?php
	$DB_NAME = 'editted_webwut';
	$USERNAME = 'root';
	$PASSWORD = '';
	// $connection = new PDO('mysql:host=localhost;dbname=editted_webwut;charset=utf8mb4', 'root', '');

	try {
        $connection = new PDO('mysql:host=localhost;dbname='.$DB_NAME.';charset=utf8mb4', $USERNAME, $PASSWORD);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully"; 
    }
    catch(PDOException $e) {
    	echo "Connection failed";
        // echo "Connection failed: " . $e->getMessage();
    }
?>