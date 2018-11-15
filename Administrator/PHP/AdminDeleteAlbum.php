<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
	$id = $_REQUEST['id'];
	$getImage = mysql_query("SELECT albumimage FROM tblalbum WHERE id = '".$id."'");
	while($rowImage = mysql_fetch_array($getImage)){
		$image = $rowImage['albumimage'];	
	}
	unlink("upload_images/album/".$image);
	$deletealbum = mysql_query("DELETE FROM tblalbum WHERE id = '".$id."'");
	$deletesong = mysql_query("DELETE FROM tblsongs WHERE songalbum = '".$id."'");
	header("Location: AdminViewAlbums.php");
}
?>