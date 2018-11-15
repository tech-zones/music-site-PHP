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
<script type="text/javascript" src="../Javascript/formvalidatecategory.js"></script>
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
    	<h4 class="header">BMEG Menu</h4>
    	<ul>
        	<li><a href="AdminCategory.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Category</a></li>
            <li><a href="AdminViewCategory.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbspView Categories</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Category Record Section</h2>	
        	<div class="form">
            	<table width="650" border="0" cellpadding="1" cellspacing="0">
                	<tr>
                    	<th class="table">ID</th><th class="table">Category</th><th class="table">Image</th><th class="table">Action</th>
                    </tr>
            	<?php
				require_once('connect.php');	
				error_reporting(E_ERROR);
				$line = 0;
				$page = 'AdminViewCategory.php';
				$dataperpage = mysql_query("SELECT * FROM tblcategory");
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
				
				$getCat = mysql_query("SELECT * FROM tblcategory ORDER BY id ASC LIMIT $eu,$limit");
				while($rowCat = mysql_fetch_array($getCat)){
					if($line == 1){
						$bgcolor = '#E0EEF8';
						$line = 0;
					}else{
						$bgcolor = '#FFFFFF';
						$line = 1;
					}
				?>
                	<tr align="center" bgcolor="<?php echo $bgcolor?>">
                    	<td align="center"><?php echo $rowCat['id']?></td>
                        <td align="center"><?php echo $rowCat['catname']?></td>
                        <td align="center"><?php echo "<img src=upload_images/category/$rowCat[catimage] width=50 height=30"?></td>
                        <td align="center">
                        <a href="AdminEditCategory.php?id=<?php echo $rowCat['id']?>" class="link">Edit<a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="AdminDeleteCategory.php?id=<?php echo $rowCat['id']?>" class="link" onclick="return confirm('Do you want to delete this?')">Delete</a>
                        
                        </td>
                    </tr>
                <?php
				if($numpage>$limit){
							echo "<table><tr><td>";
							if($back>=0){
								echo "<a href=$page?start=$back><font size=5>PREV</font></a>";	
							}
							echo "</td><td align=center>";
								$l = 1;
								for($i = 0; $i < $numpage;$i = $i + $limit){
									if($i<>$eu){
										echo "<a href=$page?start=$i><font color=red size=5>$l</font></a>";	
									}else{
										echo "<font color=red>$l</font>";	
									}
									$l = $l + 1;
								}
							echo "</td><td>";
							if($thisp<$numpage){
								echo "<a href=$page?start=$next><font size=5>NEXT</font></a>";	
							}
							echo "</td></tr></table>";
						}
				}
				?>
                </table>
            </div><!--End Form-->
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