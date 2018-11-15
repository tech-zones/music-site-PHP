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
<script type="text/javascript" src="../Javascript/formvalidatealbum.js"></script>
</head>
<script type="text/javascript">
function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
		document.getElementById('status').innerHTML=status;
	}
}
window.onload=upload;
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
        	<li><a href="AdminAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Album</a></li>
            <li><a href="AdminViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li> 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Albums</h2>	
        	<div class="form">
                 <div class="success"></div>
                 <span id="status"></span>
            	<form  method="post" id="form" enctype="multipart/form-data" action="AdminAddAlbum.php" target="uploadframe">
                    <div>
                     <iframe src="" id="uploadframe" name="uploadframe" 
                     style="width:0px; height:0px; border:0px;"></iframe>
                     </div>
                	<div>
                    	<label for="Album">Album Cat</label>
                        <select name="txtcat" id="txtcat" style="width:220px;">
                        	<option value="CATEGORY" selected="selected">SELECT CATEGORY</option>
                        <?php 
							require_once('connect.php');
							$getCat = mysql_query("SELECT id,catname FROM tblcategory");
							while($rowcat = mysql_fetch_array($getCat)){
						?>
                        	<option value="<?php echo $rowcat['id'] ?>"><?php echo $rowcat['catname']?></option>
                        <?php
							}
						?>
                        </select>
                    </div>
                	<div>
                    	<label for="Album">Album Name</label>
                        <input type="text" name="txtalbum" id="txtalbum" placeholder="Album" size="39"/>
                    </div>
                    <div>
                    	<label for="Singer">Album Singer(s)</label>
                        <input type="text" name="txtsinger" id="txtsinger" placeholder="Singer" size="39"/>
                    </div>
                     <div>
                    	<label for="Writer">Album Writer(s)</label>
                        <input type="text" name="txtwriter" id="txtwriter" placeholder="Writer" size="39"/>
                    </div>
                    <div>
                    	<label for="Description">Description</label>
                        <textarea rows="8" cols="50" placeholder="Album Description" name="txtdesc" id="txtdesc"></textarea>
                    </div>
                    <div>
                    	<label for="Image">Album Cover</label>
                        <input type="file" name="txtimage" id="txtimage"/>
                    </div>
                    <div>
                    	<input type="submit" value="Add Album" id="button1"/>
                        <input type="reset" value="Cancel" id="button2"/>
                    </div>
                   
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
</html><?php } ?>