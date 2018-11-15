<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vote Ratings</title>
<style>
.content{ width:315px; height:auto; background:#F5F5F5; border:1px solid #999;}
.header{ width:100%; height:30px; background:#494949; position:relative; color:#FFF; padding-top:5px;font-weight:bold; font-size:24px;}
#top{ padding-left:4px;}
</style>
</head>

<body>
<div class="content">
	<div class="header">Statistics</div>
        <table cellpadding="0" cellspacing="0" height="250" id="top">
        <tr>
            <th align="center" width="130">Name</th><th align="center">Percentage</th>
        </tr>
        <?php
        require_once('Administrator/PHP/connect.php');
        $getVotes = mysql_query("SELECT * FROM tblvotes") or die (mysql_error());
        while($row = mysql_fetch_array($getVotes)){
		$r = rand(128,255);
		$g = rand(128,255);
		$b = rand(128,255);
		$color = dechex($r).dechex($g).dechex($b);
        ?>
            <tr>
                <td align="center"><?php echo $row['vname']?></td>
            	<td><div style="background:#<?php echo $color?>;width:<?php echo $row['vpoints']?>px; height:22px; font-size:11px;"><?php echo $row['vpoints']?>%</div></td>
            </tr>
        <?php
        }
        ?>
        </table>	
    </div>
</div>
</body>
</html>