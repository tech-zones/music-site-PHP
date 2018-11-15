<?php
require_once('connect.php');
$id = $_POST['id'];
$name = $_POST['txtname'];
$username = $_POST['txtusername'];
$password = $_POST['txtpass'];
$update = mysql_query("UPDATE tblusers SET name='".$name."',
					  username='".$username."',
					  password='".$password."' WHERE user_id = '$id'") or die (mysql_error());
echo '<script>alert("1 Record updated!");
				window.location.href="AddUser.php"</script>';
?>