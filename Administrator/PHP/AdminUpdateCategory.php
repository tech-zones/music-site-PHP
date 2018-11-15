<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
require_once('connect.php');
$id = $_POST['id'];
$txtcat = $_POST['txtcat'];
$txtdesc = $_POST['txtdesc'];
$path = $_FILES['txtimage']['name'];

if($path == ""){
	$update = mysql_query("UPDATE tblcategory 
						  SET catname='".$txtcat."',
						  catdesc='".$txtdesc."' 
						  WHERE id = '".$id."'") or die ('An error occured ' . mysql_error());	
}else{
	$getImage = mysql_query("SELECT catimage FROM tblcategory WHERE id = '".$id."'");
	while($rowImage = mysql_fetch_array($getImage)){	
		$image = $rowImage['catimage'];
	}
	unlink("upload_images/category/".$image);
	
	if(($_FILES['txtimage']['type'] == "image/jpeg")
		||($_FILES['txtimage']['type'] == "image/pjpeg")
		||($_FILES['txtimage']['type'] == "image/png")
		||($_FILES['txtimage']['type'] == "image/gif"))
	{
			//Check errors first
			if($_FILES['txtimage']['error'] > 0){
				echo 'Error occured while processing the form';	
			}
			else{
			
				$txtimage = basename(mysql_real_escape_string($_FILES['txtimage']['name']));
				if(move_uploaded_file($_FILES['txtimage']['tmp_name'], 
						"upload_images/category/".$_FILES['txtimage']['name'])){
					$sqlalbum = mysql_query("UPDATE tblcategory SET 
											catname='".$txtcat."',
											catdesc='".$txtdesc."',
											catimage='".$txtimage."'
											WHERE id = '".$id."'") or die ('An error occured while processing the form ' . mysql_error());	
					$status = 'Success';
				}else{
					$status = 'Failed: Something went wrong';	
				}
				echo returnStatus($status);	
			}
	}else{
		echo 'Invalid image format';	
	}
	function returnStatus($status)
				{
					return "<html><body>
					<script type='text/javascript'>
						function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}
						window.onload=init;
					</script></body></html>";
				}
	
}}
?>