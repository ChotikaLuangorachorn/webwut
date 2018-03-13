<?php
// $to      = 'wiwadh.c@ku.th';
// $subject = 'the subject';
// $message = "
//     <h1>hello</h1>
// HOw are You?
// ";
$headers = 'From: no-reply@localhost' . "\r\n" .
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($receiver, $email_subject, $message, $headers);
?>