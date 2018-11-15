<?php
require_once('Administrator/PHP/connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$check = mysql_query("SELECT * FROM tblusers WHERE username = '$username' AND password ='$password'") or die(mysql_error());
if(mysql_num_rows($check) >= 1){
	while($row = mysql_fetch_array($check)){
		session_start();
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['name'] = $row['name'];
		header("Location:Administrator/PHP/AdminHome.php");	
	}
	
}else{
	header("Location:loginpage.php?error_log=1");	
}
?>