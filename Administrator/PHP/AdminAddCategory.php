<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
require_once('connect.php');
if(($_FILES['txtimage']['type'] == "image/jpeg")
	||($_FILES['txtimage']['type'] == "image/pjpeg")
	||($_FILES['txtimage']['type'] = "image/gif")
	||($_FILES['txtimage']['type'] = "image/png"))
	{
		if($_FILES['txtimage']['error'] > 0){
			echo 'Error occured while processing the form';	
		}
		else{
			
			$txtcat = $_POST['txtcat'];
			$txtdesc = $_POST['txtdesc'];
			$txtimage = basename(mysql_real_escape_string($_FILES['txtimage']['name']));
				if(move_uploaded_file($_FILES['txtimage']['tmp_name'],
					"upload_images/category/".$_FILES['txtimage']['name'])){
					$sqlinsert = mysql_query("INSERT INTO tblcategory(catname,catdesc,catimage)
									VALUES ('".$txtcat."','".$txtdesc."','".$txtimage."')") 
									or die ('An error occured ' .mysql_error());
				$status = 'Success';
				}else{
					$status = 'Failed: Something went wrong';	
				}
		}
	}else{
		echo 'Invalid image format';	
	}
	function returnStatus($status){
		return "<html><body>
				<script type='text/javascript'>
				function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}
				window.onload=init;
				</script></body></html>";
	}
}
?>