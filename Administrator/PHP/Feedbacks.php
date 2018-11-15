<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BMEG | Administrator Page</title>
<link rel="stylesheet" type="text/css" href="../css/AdminStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.7.1.min.js"></script>
</head>

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
    	<div>
    		<h4 class="header">BMEG Menu</h4>
        </div>
    	<ul>
        	<li><a href="Feedbacks.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Feed Backs</a></li>
            <li><a href="AddUser.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add User</a></li>        
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Users Feedbacks</h2>
        <table width="650" border="0" cellpadding="1" cellspacing="0">
        <tr bgcolor="">
        	<th class="table">Name</th><th class="table">Email Address</th><th class="table">Address</th><th class="table">Message</th><th class="table">Action</th>
        </tr>
        <?php 
		require_once('connect.php');
		//pagination
		$line =0;
		error_reporting(E_ERROR);
		$line = 0;
		$page = 'Feedbacks.php';
		$dataperpage = mysql_query("SELECT * FROM tblfeedback");
		$numpage = mysql_num_rows($dataperpage);
		$start = $_GET['start'];
		$eu = $start - 0;
		$limit = 10;
		$thisp= $eu + $limit;
		$back = $eu - $limit;
		$next = $eu + $limit;
		if(strlen($start) > 0 && !is_numeric($start)){
			echo 'Data Error';	
			exit();
		}			
		//Get all data from the table
		$feedbacks = mysql_query("SELECT * FROM tblfeedback LIMIT $eu,$limit");
		while($row = mysql_fetch_array($feedbacks)){
			if($row['status']==1){
				$fontcolor = '#FF3C3C';	
			}
			if($line == 1){
				$bgcolor = '#F5F5F5';
				$line=0;
			}else{
				$bgcolor = '#FFF';
				$line=1;
			}
		?>
        	<tr style="color:<?php echo $fontcolor ?>; background:<?php echo $bgcolor?>" align="center" height="30">
            	<td>
            		<?php echo $row['name']?>
            	</td>
                <td>
            		<?php echo $row['email']?>
            	</td>
                <td>
            		<?php echo $row['address']?>
            	</td>
                <td>
            		<?php echo substr($row['message'], 0,32)?>
            	</td>
                <td>
                	<a href="AdminReply.php?id=<?php echo $row['f_id']?>" class="link">REPLY</a>&nbsp;
                    <a href="AdminReply.php?id=<?php echo $row['f_id']?>" class="link">DELETE</a>
                </td>
            </tr>
        <?php
		}
		 

						if($numpage>$limit){
							echo "<table align=center><tr><td align=left>";
							if($back>=0){
								echo "<a href=$page?start=$back>PREV</a>";	
							}
							echo "</td><td align=center width=50>";
								$l = 1;
								for($i = 0; $i < $numpage;$i = $i + $limit){
									if($i<>$eu){
										echo "<a href=$page?start=$i><font color=red>$l</font></a>";	
									}else{
										echo "<font color=red>$l</font>";	
									}
									$l = $l + 1;
								}
							echo "</td><td align=right>";
							if($thisp<$numpage){
								echo "<a href=$page?start=$next>NEXT</a>";	
							}
							echo "</td></tr></table>";
						}
					?>   
        </table>
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
</html>
<?php 	
}
?>