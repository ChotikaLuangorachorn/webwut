<?php
require_once "header.php";

/*   login session >>>
 *  "ID" = orgID,
 *  "ROLE" = "OR",
 *  "displayName" = orgName
 * */

if($_SESSION["ROLE"] !== "OR"){
    header("Location: index.php");
}
echo '<br/>_GET<br/>';
echo var_dump($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Loading CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/organizer.css">

    <title>Organizer | Event Form </title>
</head>
<body>

</body>
</html>
