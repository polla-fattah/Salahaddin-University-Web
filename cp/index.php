<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Control Panel Login</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA>
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
		&nbsp;</td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<font color="#000080">Salahaddin University Login</font></td>
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
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Login</font></td>
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
						<form action =control.php method =post>
						<font color="#0066CC">
						<b>&nbsp; &nbsp;Please Enter User name and 
						Password :</b></font>
						<table border = 0 cellpadding = 2 cellspacing = 1 width="100%">
						<tr>
							<td width="86"><font color="#000080"><b>User Name</b></font></td>
							<td><input type =text name = usernam style ="width:150px"></td>
						</tr>
						<tr>
							<td width="86"><font color="#000080"><b>Password</b></font></td>
							<td><input type = password name = pas style ="width:150px"></td>
						</tr>
						<?php
							if(isset($_REQUEST['w']))
								print "<tr><td colspan = 2 align =center><font color='#FF0000'><b>Please fill all fields</b></font></td></tr>";
							if(isset($_REQUEST['a']))
								print "<tr><td colspan = 2 align =center><font color='#FF0000'><b>Wrong user name and pasword combination</b></font></td></tr>";
						?>
						<tr>
							<td colspan = 2 align =center><input type = submit name = log value = 'Login'></td>
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