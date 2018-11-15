<?php
require_once('connect.php');
$mymsg = $_POST['adminmsg'];
$name = $_POST['name'];
$to = $_POST['email'];
$subject = 'BMEG Music user feedbacks';
$from = 'bmegmusic@yahoo.com';
$header = 'From '. $from;
$message = "Hello ".$name ." thank you for sending as you feedback. <br/>" .$mymsg;
mail($to,$subject,$message,$header);
$updateStatus = mysql_query("UPDATE tblfeedback SET status ='1'") or die (mysql_error());
echo "<script>alert('Message has been sent!');window.location.href='feedbacks.php';</script>";
?>