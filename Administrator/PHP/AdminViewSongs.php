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
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
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
        	<li><a href="AdminAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Album</a></li>
            <li><a href="AdminViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">View Album Songs</h2>
                <?php
				require_once('connect.php');
				$id = $_REQUEST['id'];
				$getRows = mysql_query("SELECT * FROM tblsongs WHERE songalbum = '$id'");
				if($getRows = mysql_num_rows($getRows)==0){
					echo '<div class=error>No Songs has been uploaded for this album</div>';	
				}else{
				$getSong = mysql_query("SELECT 
									   tblalbum.albumname,
									   tblalbum.albumimage,
									   tblsongs.songcat,
									   tblsongs.songwriter,
									   tblsongs.songsinger 
									   FROM tblsongs,tblalbum WHERE tblalbum.id = tblsongs.songalbum 
									   AND songalbum = '".$id."'");
				
				while($row = mysql_fetch_array($getSong)){
					$songcat = $row['songcat'];
					$songalbum = $row['albumname'];
					$songwriter = $row['songwriter'];
					$songsinger = $row['songsinger'];
					$albumimage = $row['albumimage'];
				}
				?>
        <table cellpadding="0" cellspacing="0" width="650">
        	<tr>
            	<th class="table" align="left">Songs</th><th class="table"></th>
            </tr>
        	<tr>

     <td width="120" align="center"><?php echo "<img src=upload_images/album/$albumimage width=118 height=118" ?></td>    
                <td>
                	<table cellpadding="0" cellspacing="0" class="td_data">
                    	<tr>
                        	<td height="30" class="td_data">Category</td> 
                            <td height="30" class="td_data"><strong><?php echo $songcat ?></strong></td> 
                        </tr>
                        <tr>
                        	<td height="30" class="td_data">Album</td> 
                            <td height="30" class="td_data"><strong><?php echo $songalbum ?></strong></td> 
                        </tr>
                        <tr>
                        	<td height="30" class="td_data">Singer</td>
                            <td height="30" class="td_data"><strong><?php echo $songsinger ?></strong></td>  
                        </tr>
                        <tr>
                        	<td height="30" class="td_data">Writer</td>
                            <td height="30" class="td_data"><strong><?php echo $songwriter ?></strong></td>  
                        </tr>
                        
                    </table>
                </td>
                <tr>
                	<th class="th_data">#</th><th class="th_data">Song Title</th>
                </tr>
                <?php
				$count =0;
				error_reporting(E_ERROR);
				$getSong = mysql_query("SELECT songfile FROM tblsongs WHERE tblsongs.songalbum = '$id'");
				while($rowSong = mysql_fetch_array($getSong)){
				$count++;
				if($line==1){
					$bgcolor = '#FFFFFF';
					$line = 0;
				}else
				{
					$bgcolor='#E0EEF8';
					$line = 1;
				}
				?>
                <tr bgcolor="<?php echo $bgcolor?>">
                	<td  align="center" class="td_class"><?php echo $count?></td>
                	<td  align="center" class="td_class"><?php echo preg_replace("/\\.[^.\\s]{3,4}$/", "", $rowSong['songfile']); ?></td>
                </tr> 
                <?php } ?> 
          </table>
          <?php 
			//}else{
			//	echo 'No song yet';	
			}
		  ?>

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
</html><?php }?>