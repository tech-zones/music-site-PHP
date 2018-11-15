<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BMEG Music</title>
<link rel="stylesheet"  type="text/css" href="CSS/index.css" />
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.error').delay(1200).fadeOut('normal');
	$('.success').delay(1200).fadeOut('normal');	
});
</script>
<script type="text/javascript">

function slideSwitch() {
    var $active = $('#slideshow DIV.active');

    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');

    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');

    // uncomment below to pull the divs randomly
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<!--CSS Style-->
<style type="text/css">
#slideshow {
    position:relative;
    height:272px;
}

#slideshow DIV {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
    height: 272px;
    background-color: #FFF;
}

#slideshow DIV.active {
    z-index:10;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:9;
}

#slideshow DIV IMG {
    height: 272px;
	width:630px;
    display: block;
    border: 0;
    margin-bottom: 10px;
}

.news_content ul{ padding:0px; margin:0px;}
.news_content ul li{
	padding-top:10px;
	padding-left:5px;
	list-style:none; 
	font-size:11px;
}
.news_content ul li a{
	text-decoration:none;
	color:#7E7E7E;
	font-family:Georgia, "Times New Roman", Times, serif;
}
.news_content ul li a:hover{
	text-decoration:underline;
	color:#09F;
}
#table{
	color:#7E7E7E;
	font-family:Georgia, "Times New Roman", Times, serif; font-size:11px;}

#apDiv1 {
	position:absolute;
	width:630px;
	height:272px;
	z-index:1;
	border:1px solid #FFF;
	left: 31px;
	top: 23px;
}
</style>
</head>

<body>

<div class="header_wrapper">
    	<!--for date and signout-->
        <div class="login">
          		<?php
				$today = date('F j, Y');
				echo '&nbsp;Today is '.$today;
				?>
                &nbsp;&nbsp;&nbsp;<a href="Frontend/FeedbackForm.php" id="fback">Submit Feedback</a>
            <ul>		
                <li><a href="loginpage.php">Admin Login</a></li>                
            </ul>
   		</div>
</div>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
        	<li><a href="index.php">HOME</a></li>
            <li><a href="Frontend/Albums.php">ALBUMS</a></li>
            <li><a href="Frontend/Licensing.php">LICENSING</a></li>
            <li><a href="Frontend/Songs.php">VOTE</a></li>
            <li><a href="Frontend/AboutUs.php">ABOUT US</a></li>   
            <li><a href="Frontend/News.php">NEWS</a></li>
            
    	</ul>
    </div>
</div>
<!--End Menu-->
<div class="header_under"></div>
<div class="container_wrapper"><!--Start Container for the web content-->
    <div class="home_content"> <!--Start Web Content-->
        <div class="banner">
        	<!--Banner place-->
          <div id="apDiv1">
          
         	<div id="slideshow">
   				 <div class="active">
      			  <img src="image/Callalily.jpg" alt="Slideshow Image 1" />
        			
   				 </div>
    
  				  <div>
      				 <img src="image/kmkz.jpg" alt="Slideshow Image 2" />
      				 
   				 </div>
    
   				 <div>
      				 <img src="image/slapshock.jpg" alt="Slideshow Image 3" />
      			
   				 </div>
    
    			<div>
       				 <img src="image/updharmadown.jpg" alt="Slideshow Image 4" />
       				 
   				 </div>
    
			</div>

          
          
          </div>
        </div>
        <div class="vote_container"> 
        	<form id="vote" name="vote" method="post"  action="vote.php">
            	<div class="header_vote"> 
                	<div id="header_vote_title">Community Poll Survey</div>
                    <div id="message">Please Vote for you favorite waray song genre listed below.<a href="ShowVoteStat.php" id="link">See Statistic here!</a></div>  
                    <br />
                    <?php
					require_once('Administrator/PHP/connect.php');
					$getVote = mysql_query("SELECT * FROM tblvotes");
					while($row = mysql_fetch_array($getVote)){
					?>
    				<input type="radio" name="id" value="<?php echo $row['vid'] ?>"/>&nbsp;<label><?php echo $row['vname']?></label><br />
                    <?php } ?>
					<input type="submit" value="Vote" id="vote" name="vote"/>
                    <?php
                    if(isset($_GET['error'])==1){
                    ?> 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <div class="error">Wait after 24 hours</div> 
                    <?php 
					} 
					if(isset($_GET['success'])==1){
					?>       
                     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                      <div class="success">Thank you</div> 
                    <?php } ?>
                </div>
            </form>
        </div>
    </div> <!--End Web Content-->    
<div class="img_container"><!--Start image container-->
			
       <div id="class_col1">
          <img src="image/updharmadown.jpg" height="165" width="216" id="img"/>
       </div>
       <div id="class_col2"><img src="image/slapshock.jpg" height="165" width="216" id="img"/></div>
       <div id="class_col3"><img src="image/Callalily.jpg" height="165" width="216" id="img"/></div>
       <div id="class_col4"><img src="image/kmkz.jpg" height="165" width="216" id="img"/></div>
    </div><!--End image containers-->
<div class="col1"><!--Start Bottom web content-->
   	 <div class="header">
    		<div id="header_title">NEW RELEASE</div>
            <?php 
			require_once('Administrator/PHP/connect.php');
			$sql = mysql_query("SELECT * FROM tblalbum ORDER BY id DESC LIMIT 7");
			while($rowAlbum = mysql_fetch_array($sql)){
			?>
            <div class="album_holder">
            	<div class="content_holder">
                	<div class="content">
                    <?php echo "<img src=Administrator/PHP/upload_images/album/$rowAlbum[albumimage] height=50 width=60>"?>
                    <div class="left">
                    <?php
						echo '<label id=title>&nbsp;<a href=Frontend/ViewSongs.php?id='.$rowAlbum['id'].' id=link>'.$rowAlbum['albumname'].'</a></label><br/>';
						echo '<label id=title1>&nbsp;'.$rowAlbum['albumsinger'].'</label><br/>';
						echo '<label id=title1>&nbsp;'.$rowAlbum['albumwriter'].'</label>';
					?>
                    </div><!--end left-->
                	</div>
                </div>
            </div>
            <?php } ?>	
        </div>
    </div>
   	 <div class="col2">
    	<div class="header">
    		<div id="header_title">BMEG TOP 6 SONGS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Frontend/SongRank.php" id="link" style="font:Verdana, Geneva, sans-serif; font-size:12px;">See Rankings</a></div>
            <table cellpadding="0" cellspacing="0" height="230" id="table"> 
                <tr style="color:#7E7E7E; ">
                    <th style="border-bottom:1px dashed #CCC">Title</th><th style="border-bottom:1px dashed #CCC">Statistics</th>
                </tr>
				<?php 
				$getVotes = mysql_query("SELECT songfile,songpoints FROM tblsongs WHERE songpoints >=1 ORDER BY songpoints DESC LIMIT 6") or die (mysql_error());
				while($row = mysql_fetch_array($getVotes)){
				$r = rand(128,255);
				$g = rand(128,255);
				$b = rand(128,255);
				$color = dechex($r).dechex($g).dechex($b);
        		?>
                <tr>
                    <td align="left" width="228" style="border-bottom:1px dashed #CCC; text-indent:5px;"><?php echo preg_replace("/\\.[^.\\s]{3,4}$/", "", $row['songfile'])?></td>
                    <td style="border-bottom:1px dashed #CCC; text-indent:5px;" width="142"><div style="background:#<?php echo $color?>;width:<?php echo $row['songpoints']?>px; height:22px; font-size:11px; height:15px;"></div></td>
                </tr>
				<?php
                }
                ?>
            </table>
        </div>
     <div class="header">
    		<div id="news_header">NEWS</div> 
                <div class="news_content">
                    <ul>
                    	<li><a href="#">BMEG music start community projects</a></li>
                        <li><a href="#">Parokya ni Edgar is now in BMEG</a></li>
                        <li><a href="#">BMEG financial statement release</a></li>
                        <li><a href="#">BMEG Music Company Annual Report</a></li>
                        <li><a href="#">BMEG International Expansion</a></li>
                        <li><a href="#">BMEG music </a></li>
                        <li><a href="#">BMEG music opens its new office in Cebu</a></li>
                        <li><a href="#">Callalily contract signing with BMEG music</a></li>
                        <li><a href="#">BMEG music teamed up with Star Records for big productions</a></li>
                        <li><a href="#">BMEG music start community projects</a></li>
                    </ul>
                </div>
        	</div>
    	</div>
    	<div class="col3">
    	<div class="header">
    		<div id="header_title">FEATURED NEW SONGS</div>
            <?php 
			$sql = mysql_query("SELECT tblsongs.id,tblsongs.songfile,tblalbum.albumimage,tblalbum.albumname,tblsongs.songsinger FROM tblsongs,tblalbum WHERE tblsongs.songalbum = tblalbum.id AND songcat = 'OPM' ORDER BY id DESC LIMIT 7");
			while($rowAlbum = mysql_fetch_array($sql)){
			?>
            <div class="album_holder">
            	<div class="content_holder">
                	<div class="content">
                		<?php echo "<img src=Administrator/PHP/upload_images/album/$rowAlbum[albumimage] height=50 width=60>"?>		<div class="left"><!--Start music information container-->
                        <?php
						echo '<label id=title>&nbsp'.$rowAlbum['albumname'].'</label><br/>';
						echo '<label id=title1>&nbsp;'.$rowAlbum['songsinger'].'</label><br/>';
						?>
                        <a href="Administrator/PHP/songs/<?php echo $rowAlbum['songfile']?>" id="link">Play</a>
                    </div><!--ENd music information container-->

                    </div>
                </div><!--End content holder-->
            </div><!--End album holder-->
            <?php } ?>      
            </div><!--End header-->           
    	</div><!--End col3-->
    </div><!--End col2-->
  </div><!--End Bottom web content--> 
</div><!--End Container-->
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
