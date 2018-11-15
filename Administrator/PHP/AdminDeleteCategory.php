<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
	$id = $_REQUEST['id'];
	$getimage = mysql_query("SELECT catimage FROM tblcategory WHERE id = '".$id."'");
	while($rowImage = mysql_fetch_array($getimage)){
		  $image = $rowImage['catimage'];	
	}
	unlink("upload_images/category/".$image);
	$delete = mysql_query("DELETE FROM tblcategory WHERE id = '".$id."'") or die ('An error occured '.mysql_error());
	$delete = mysql_query("DELETE FROM tblalbum WHERE albumcat = '".$id."'")or die ('An error occured '.mysql_error());
	header("Location:AdminViewCategory.php");
}
?>