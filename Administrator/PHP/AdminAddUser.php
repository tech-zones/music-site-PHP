<?php
require_once('connect.php');
if($_POST['txtusername']=="" || $_POST['txtusername']=="" || $_POST['txtpass']==""){
	echo '<script>alert("All Fields are Required");
				window.location.href="AddUser.php"</script>';	
}else{
$name = $_POST['txtusername'];
$username = $_POST['txtusername'];
$password = $_POST['txtpass'];

$Adduser = ("INSERT INTO tblusers(name,username,password) VALUES ('".$name."','".$username."','".$password."')");
	if(!mysql_query($Adduser)){
		die(mysql_error);
	}else{
		echo '<script>alert("1 Record added!");
				window.location.href="AddUser.php"</script>';	
	}
}
?>