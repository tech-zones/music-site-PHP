<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BMEG Music | Feedback Form</title>
<link rel="stylesheet"  type="text/css" href="CSS/index.css"/>
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<style type="text/css">
.FeedBackForm{text-align:left; margin-top:10px;}
#fname,#fmessage,#femail,#faddress{ margin-top:4px; margin-bottom:12px;}
#f{ font-family:Arial, Helvetica, sans-serif; font-size:13px; font-weight:bold; margin-left:2px;}
#sub,#can{ cursor:pointer; width:70px; height:30px; font-family:"Courier New", Courier, monospace; font-weight:600}
#sub:hover,#can:hover{
	color:#06F;
	-moz-box-shadow:0px 0px 5px #B0B0B0;
	-webkit-box-shadow:0px 0px 5px #B0B0B0;
	-khtml-box-shadow:0px 0px 5px #B0B0B0;
	border:1.5em medium #B0B0B0;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('.success').delay(4000).fadeOut('normal');
	$('.error').delay(4000).fadeOut('normal');
})
</script>
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
	<!--Start Container for the web content-->
	<div class="playlist_wrapper">
    <div class="submenu"></div>
        <div class="pcontainer">
    	
        <form id="feedback" method="post" action="Feedback.php">
        <?php if(isset($_GET['success'])==1){ ?>
        	<div class="success">Feedback has been submitted. Thank you!</div>
        <?php } ?>
        <?php if(isset($_GET['error'])==1){ ?>
        	<div class="error">Opps! All fields are requried</div> 
        <?php }?>  
        	  <h3 style="color:#09F; font-size:20px">Feedback Form</h3>
        	<div class="FeedBackForm" id="FeedBackForm">
                <label for="fname" id="f">Name</label><br />
                <input type="text" name="fname" id="fname" size="60" placeholder="Complete Name"/><br />  
                <label for="femail" id="f">Email Address</label><br />
                <input type="text" name="femail" id="femail" size="60" placeholder="Email Address"/><br />
                <label for="faddress" id="f">Address</label><br />
                <input type="text" name="faddress" id="faddress" size="60" placeholder="Address"/><br />
                <label for="fmessage" id="f">Message</label><br />
                <textarea name="fmessage" cols="37" rows="8" placeholder="Your Message" id="fmessage"></textarea>  
            </div> 	
            <div>
            	<input type="submit" value="Submit" id="sub"/>&nbsp;<input type="reset" value="Cancel" id="can"/>
            </div>
        </form>
        </div>
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