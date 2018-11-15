<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
require_once('connect.php');
$id = $_REQUEST['id'];
$reply = mysql_query("SELECT name,email,message FROM tblfeedback WHERE f_id = '$id' ");
while($row = mysql_fetch_array($reply)){	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BMEG | Administrator Page</title>
<link rel="stylesheet" type="text/css" href="../css/AdminStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../Javascript/formvalidatecategory.js"></script>
</head>
<script type="text/javascript">

function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
		document.getElementById('form').innerHTML='status';
	}	
}
window.onload='upload';
</script>
<body>
<div class="header_wrapper">
	<div class="login">
          <?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
				?>
            <ul>
            	
                <li><a href="logout.php">Admin Logout</a></li>
            </ul>
   	</div>
</div>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
        	<li><a href="AdminHome.php">HOME</a></li>
            <li><a href="AdminCategory.php">CATEGORIES</a></li>
            <li><a href="AdminAlbum.php">ALBUMS</a></li>
 
    	</ul>
    </div>
</div>
<!--End Menu-->
<div class="header_under"></div>
<!--Start Container for the web content-->
<div class="container_wrapper">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<h4 class="header">BMEG Menu</h4>
    	<ul>
        	<li><a href="Feedbacks.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Feedbacks</a></li>
            <li><a href="AddUser.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New User</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Reply User Feedbacks</h2>	
        	<div class="form">
            	<div class="error"></div>
                <div class="success"></div>
                <form action="send.php" method="post">
                    <table>
                        <tr>
                            <td align="right">To:</td>
                            <td><input type="text" value="<?php echo $row['name']?>" readonly="readonly"  size="79" name="name"/></td>
                        </tr>
                        <tr>
                            <td align="right">Email Address:</td>
                            <td><input type="text" value="<?php echo $row['email']?>" readonly="readonly" size="79" name="email"/></td>
                        </tr>
                        <tr>
                            <td align="right">Original Message:</td>
                            <td>
                            <textarea rows="8" cols="60" readonly="readonly" style="max-height:200px; max-width:500px; min-height:200px; min-width:500px;"><?php echo $row['message']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Your Message</td>
                            <td>
                                <textarea rows="11" cols="60" style="max-height:200px; max-width:500px; min-height:200px; min-width:500px;" name="adminmsg"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit"  value="Send"/>&nbsp;<input type="button" value="Back" onclick="window.location.href='Feedbacks.php'" /></td>
                        </tr>
                    </table>
	</form>
            </div>
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
<div class="footer_wrapper">
    <div class="footer_menu">
    	<ul>
        	<li>Find the us <a href="Frontend/Contacts.php">BMEG Music Office</a> or <a href="Frontend/Contacts.php">contact us</a>  for more information</li>  
        </ul>
        <br /> <br /> <br />
        <span style="color:#999; font-size:14px; margin-top:10px;">&copy;2012 BMEG Music, Inc.</span>
    </div>
</div>
</body>
</html><?php } }?>