<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/index.css"/>
<title>BMEG Music | Song Vote</title> 
<style>

</style>
</head>

<body>
<div class="header_wrapper">
	<div class="login">
            <?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
			?>
            &nbsp;&nbsp;&nbsp;<a href="FeedbackForm.php">Submit Feedback</a>
            <ul>	
                <li><a href="../loginpage.php">Admin Login</a></li>
            </ul>
   	</div>
</div>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
        	<li><a href="../index.php">HOME</a></li>
            <li><a href="Albums.php">ALBUMS</a></li>
            <li><a href="Licensing.php">LICENSING</a></li>
            <li><a href="Songs.php">VOTE</a></li>
            <li><a href="AboutUs.php">ABOUT US</a></li>
            <li><a href="News.php">NEWS</a></li>
            
    	</ul>
    </div>
</div>
<!--End Menu-->
<div class="header_under"></div>
<div class="container_wrapper"><!--Start Container for the web content-->
   <div class="message">
   		
   </div><!--End Message Container-->
   <div class="songcolumn">
   		<div class="header_title">Song List..</div>

   		<form action="votesong.php" method="post">
			<?php
			/*error_reporting(E_ERROR);
			$page = 'Songs.php';
			$dataperpage = mysql_query("SELECT * FROM tblsongs");
			$numpage = mysql_num_rows($dataperpage);
			$start = $_GET['start'];
			$eu = $start - 0;
			$limit = 24;
			$thisp= $eu + $limit;
			$back = $eu - $limit;
			$next = $eu + $limit;
			if(strlen($start) > 0 && !is_numeric($start)){
				echo 'Data Error';	
			exit();
			}*/
			require_once('../Administrator/PHP/connect.php');
            $songs = mysql_query("SELECT tblalbum.albumname,tblalbum.albumimage,tblsongs.songsinger,tblsongs.id 
                                 FROM tblalbum,tblsongs WHERE tblsongs.songalbum = tblalbum.id");
            $limit = 4;
            $count = 0;
            echo "<table width=900>";
                    while($rowSongs = mysql_fetch_array($songs)){
                        $id     = $rowSongs['id']; 
                        $image  = $rowSongs['albumimage'];
                        $name   = $rowSongs['albumname'];
                        $singer = $rowSongs['songsinger'];
                        
                        if($count < $limit){
                            if($count == 0){
                                echo "<tr>"; //Start table row
                        }
                            echo "<td width=80><img src=../Administrator/PHP/upload_images/album/$image width=90 height=80></td>";
                            echo "<td>$name<br/>$singer<br/><input type=radio value='$id' name='song'/></td>";
                            }else{
                                $count = 0;
                                echo "</tr><tr>"; //End table row
                                echo "<td width=80><img src=../Administrator/PHP/upload_images/album/$image width=90 height=80></td>";					
                                echo "<td>$name<br/>$singer<br><input type=radio value='$id' name='song'/></td>";				
                            }
                        $count++;
                    }
            echo "</tr></table>";
            ?>
            <input type="submit" value="Vote Song" name="submit" id="sub"/>
     </form>
     <?php
			/*
			Paginate data
				if($numpage>$limit){
					echo "<table align=center><tr><td align=left>";
						if($back>=0){
							echo "<a href=$page?start=$back>PREV</a>";	
						}
							echo "</td><td align=center width=200>";
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
			*/
			?>
   </div><!--End song column container-->
</div><!--End Container-->
<div class="footer_wrapper">
    <div class="footer_menu">
    	<ul>
        	<li>Find the us <a href="Contacts.php">BMEG Music Office</a> or <a href="Contacts.php">contact us</a> for more information</li>    
        </ul>
        <br /> <br /> <br />
        <span style="color:#999; font-size:14px; margin-top:10px;">&copy;2012 BMEG Music, Inc.</span>
    </div>
</div>
</body>
</html>