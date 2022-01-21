<?php
	session_start();
	
	include("config.php");
	if(isset($_SESSION['u']) and isset($_SESSION['p']) )
	{
		$user = $_SESSION['u'];
		$pass = $_SESSION['p'];
	}
	else
	{
		session_destroy();
			die("<center><font color = red size =5><b>If you think that you have privlage to see this page please <a href = index.php>Ligin</a> then go back</b></font></center>");
	}
	////////////////////////////////
	$logins =mysql_query("Select id,name,lastlogin from users order by name") or die(mysql_error());
?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Users Account</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA >
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
		<a href  =control.php><font face="Albany" size="2">Control Panel</font></a></td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<b>
		<font face="Albany" size="3" color="#000080">Login Records</font></b></td>
	<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
			<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
	</td>
</tr>
<tr>
	<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">
	<table border = 0 cellpadding = 0 cellspacing = 0 width = 100% height =400>
	<tr>
	<td><?php include("left.php");?></td>
		<td>&nbsp;<br><!---Body of the work--->

<table align = center width = 96% cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Users</font></td>
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
						<p style ="margin:2px" align =left>&nbsp;&nbsp;&nbsp; 
						</p>
						<table border = 1 cellpadding = 1 cellspacing =0 width =98%>
						<form action = useraccount.php method =post> 
						<tr>
							<th width='146'>User ID</th>
							<th width='322'>User Name</th>
							<th width='322'>Last Login</th>
						</tr>
						<?php
							$color ="";
							while($login= mysql_fetch_array($logins))
							{
								$color = (($color == "#EEEEEE")?"#CCCCCC" : "#EEEEEE");
								print "<tr bgcolor =$color><td>$login[id]</td>";
								print "<td align = center>$login[name]</td>";
								print "<td width=273>$login[lastlogin]</td>";
							}
						?>
						
						</form>
						</table>
						<br>
						</td>
					</tr>
					</table>
					</td>
				</tr>
				</table><br><br>		
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>