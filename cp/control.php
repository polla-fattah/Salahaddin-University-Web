<?php
	session_start();
	
	include("config.php");
	$first = false;
	if(@$_POST['usernam'] !="" and @$_POST['pas'] != "" )
	{
		$user = $_POST['usernam'];
		$pass = $_POST['pas'];
		$_SESSION['u'] = $user;
		$_SESSION['p'] = $pass;
		$first = true;
	}
	else if(isset($_SESSION['u']) and isset($_SESSION['p']))
	{
		$user = $_SESSION['u'];
		$pass = $_SESSION['p'] ;
	}
	else
		die("<Script>window.location = 'index.php?w=1'</Script>");

	$privilege = mysql_query("Select * from users where id ='$user' and pass = '$pass'");
	if(!($privilege = mysql_fetch_array($privilege)))
		die("<Script>window.location = 'index.php?a=1'</Script>");
	else if($first)
	{
		$today = getdate();
		$date = "$today[mday]-$today[mon]-$today[year]";
		mysql_query("update users set lastlogin='$date' where id='$user'")or die(mysql_error());
	}

	if(isset($_POST['edit']))
		if(isset($_POST['save']))
		{
			$con = str_replace("../acbhzxt/","acbhzxt/",$_POST['context']);
			$query = "Update subjects set context ='$con' where id = $_POST[sid]";
			mysql_query($query) or die(mysql_error());
		}
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Control Panel</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA>
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
		<a href =changepass.php><font face="Albany" size="2">Change Password</font></a></td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<font face="Albany" size="2" color="#E64A00">Welcome: </font><font size="2" face="Albany"><?php print $privilege['name']; $_SESSION['n']=$privilege['name'];?></font>
	</td>
	<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
			<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
	</td>
</tr>
<tr>
	<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">
	<table border = 0 cellpadding = 0 cellspacing = 0 width = 100%>
	<tr>
		<?php include("left.php"); ?>
		<td><br>
		<?php
			if($user =='admin')
		{
		?>
		<table align = center width = 500 cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' width =457 > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Administrative 
							Control</font></td>
							<td background = 'images/top-right.gif' width =27> </td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000;"> 
					<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 >
					<tr>
						<td style="border-left:2px solid #000080; border-right:2px solid #000080; border-bottom:2px solid #000080; padding:3px; ">
						<table width = 97% cellpadding = 0 cellspacing = 0 border =0 align =center>
						<tr>
							<td align =center ><a href = useraccount.php><img src ='images/Useracount.jpg' border =0><br>User Accounts</a></td>
							<td align =center ><a href = logins.php><img src ='images/logins.jpg' border =0><br>Logins</a></td>
							<td align =center ><a href = editingtracks.php><img src ='images/tracker.jpg' border =0><br>Editing Tracker</a></td>
						</tr>
						</table>
						</td>
					</tr>
					</table>
					</td>
				</tr>
				</table>
			<br>
			<?php
			}//end of if($user...
			?>
			<table align = center width = 500 cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' width =454 > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Elements 
							Control</font></td>
							<td background = 'images/top-right.gif' width =28> </td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000;"> 
					<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height="95" >
					<tr>
						<td align=center valign = top style="border-left:2px solid #000080; border-right:2px solid #000080; border-bottom:2px solid #000080; padding:3px; ">
						<table width = 98% border = 0 cellpadding = 0 cellspacing =0>
						<?php
							$rowindicator = 0;
							for($i=0 ; $i < 18 ; $i++)
							{
								if($privilege["$mainLinks[$i]"] =='t')
								{
									if($rowindicator%3 == 0)
										print "<tr>";
									if($i==0)
											print "<td align = center style='padding-top:15px' ><a href = homepage.php><img border='0' src='images/$i.jpg' width='80' height='80' width = 33%><br>$mainLinks[$i]</a></td>";
									else
											print "<td align = center style='padding-top:15px' ><a href = main.php?subject=$i><img border='0' src='images/$i.jpg' width='80' height='80' width = 33%><br>$mainLinks[$i]</a></td>";
									$rowindicator++;
								}
							}
						?>
						</table>
						</td>
					</tr>
					</table>
					</td>
				</tr>
				</table>
		<p>&nbsp;</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>