<?php
	session_start();
	$changed='polla';
	include("config.php");
	if( !(isset($_SESSION['u']) and isset($_SESSION['p'])) )
	{
		session_destroy();
			die("<center><font color = red size =5><b>If you think that you have privlage to see this page please <a href = index.php>Ligin</a> then go back</b></font></center>");
	}
	if(isset($_POST['changeit']))
	{
		$changed='y';
		if($_POST['newpas'] == $_POST['repas'])
		{
			if($_POST['oldpas'] == $_SESSION['p'])
			{
				mysql_query("update users set pass='$_POST[newpas]' where id='$_SESSION[u]'") or die(mysql_error());
				$_SESSION['p'] =$_POST['newpas'];
			}
			else
				$changed = 'r';
		}
		else
			$changed = 'd';
	}
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Change Password</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA>
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
	<a href = control.php>Back</a>	
	</td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<font color="#000080">Change Password</font></td>
	<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
			<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
	</td>
</tr>
<tr>
	<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">
	<table border = 0 cellpadding = 0 cellspacing = 0 width = 100%>
	<tr>
		<?php include("left.php"); ?>
		<td>&nbsp;<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p><br>
		
			<br>
			</p>
			<table align = center width = 500 cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' width =454 > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Change 
							password</font></td>
							<td background = 'images/top-right.gif' width =28> </td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000;"> 
					<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height="95" >
					<tr>
						<td valign=top style="border-left:2px solid #000080; border-right:2px solid #000080; border-bottom:2px solid #000080; padding:3px; ">
						<form action =changepass.php method =post>
						<table border = 0 cellpadding = 2 cellspacing = 1 width="100%">
						<tr>
							<td width="29%"><font color="#000080"><b>Old 
							Password</b></font></td>
							<td width="68%"><input type =password name = oldpas style ="width:150px"></td>
						</tr>
						<tr>
							<td width="29%"><font color="#000080"><b>New Password</b></font></td>
							<td width="68%"><input type = password name = newpas style ="width:150px"></td>
						</tr>
						<tr>
							<td width="29%"><font color="#000080"><b>Retype Password</b></font></td>
							<td width="68%"><input type = password name = repas style ="width:150px"></td>
						</tr>
						<?php
							if($changed=='d')
								print "<tr><td colspan = 2 align =center><font color='#FF0000'><b>The new password do not Match!</b></font></td></tr>";
							else if($changed=='r')
								print "<tr><td colspan = 2 align =center><font color='#FF0000'><b>Wrong Password!</b></font></td></tr>";
							else if($changed == 'y')
								print "<tr><td colspan = 2 align =center><font color=green ><b>Your Password Has Been Changed!</b></font></td></tr>";
						?>
						<tr>
							<td colspan = 2 align =center><input type = submit name = changeit value = 'Change'></td>
						</tr>
						</form>
						</table>
					</td>
					</tr>
					</table>
					</td>
				</tr>
				</table>
		<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>