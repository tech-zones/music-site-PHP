<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
	if(($_FILES['txtsong']['type'] == "audio/mpeg")
		||($_FILES['txtsong']['type'] == "audio/mp3"))
	{
	
			if(file_exists("songs/".$_FILES['txtsong']['name'])){
				echo "<script>alert('Song already exists');window.location.href='AdminViewAlbums.php';</script>";
			}else{
				$txtcat = $_POST['txtcat'];
				$txtdesc = $_POST['txtdesc'];
				$txtalbum = $_POST['txtalbum'];
				$txtsinger = $_POST['txtsinger'];
				$txtwriter = $_POST['txtwriter'];
				$txtsong = basename(mysql_real_escape_string($_FILES['txtsong']['name']));
				$insert = mysql_query("INSERT INTO tblsongs(songcat,songalbum,songsinger,songdesc,songfile,songwriter) VALUES('".$txtcat."','".$txtalbum."','".$txtsinger."','".$txtdesc."','".$txtsong."','".$txtwriter."')") 
				or die ('An error occured '. mysql_error());	
				move_uploaded_file($_FILES['txtsong']['tmp_name'], "songs/".$_FILES['txtsong']['name']);
			}
	}else{
		echo 'Invalid audio format';	
	}
}
?>