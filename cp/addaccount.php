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
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Add Account</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA >
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
		<a href = useraccount.php><font face="Albany" size="2">Back</font></a></td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<b><font face="Albany" color="#000080">Add Account</font></b></td>
	<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
			<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
	</td>
</tr>
<tr>
	<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">
	<table border = 0 cellpadding = 0 cellspacing = 0 width = 100% height =400>
	<tr>
	<td><?php include("left.php");?></td>
		<td><br><!---Body of the work--->

<table align = center width = 96% cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Account</font></td>
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
					<form action =useraccount.php method =post>
						<font color="#FF0000">*</font><b> Indicates Required Fields
						</b> <br>
					<table cellpadding = 0 cellspacing = 0 border = 0 width = 100% height="119">
					<tr>
						<td width="110" height="29">Full&nbsp; Name<font color="#FF0000">*</font> </td>
						<td height="29"><input type =text name = uname size="28"> 
						<?php if(isset($_REQUEST['m']) and $_REQUEST['m'] ==2) print "<font color =red>Please write a name!</font>";?></td>
					</tr>
					<tr>
						<td width="110" height="28">User ID<font color="#FF0000"> 
						*</font> </td>
						<td height="28"><input type =text name = uid size="28"> 
						<?php 
						if(isset($_REQUEST['m']) and $_REQUEST['m'] ==3) 
							print "<font color =red>Please write an ID!</font>";
						if(isset($_REQUEST['m']) and $_REQUEST['m'] ==6) 
							print "<font color =red>Please Choose another Id this one is unavalable!</font>";
						?></td>
					</tr>
					<tr>
						<td width="110" height="27">Password<font color="#FF0000"> 
						*</font> </td>
						<td height="27"><input type =password name = pas1 size="28">
						<?php 
						if(isset($_REQUEST['m']) and $_REQUEST['m'] ==4) 
							print "<font color =red>Please write a password!</font>";
						if(isset($_REQUEST['m']) and $_REQUEST['m'] ==5) 
							print "<font color =red>Passwords Not Match!</font>";
						?>
						</td>
					</tr>
					<tr>
						<td width="110">Re-Password<font color="#FF0000"> *</font> </td>
						<td><input type = password name = pas2 size="28"></td>
					</tr>
					<tr>
						<td width="110"></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td width="110" style = 'padding-bottom:10px'><b><font size="4">&nbsp;&nbsp;&nbsp; Privileges:&nbsp;
						</font></b> </td>
						<td><?php if(isset($_REQUEST['m']) and $_REQUEST['m'] ==1) print "<font color=red>You sould select at least one privilege</font>";?></td>
					</tr>
					<tr>
						<td colspan=2>
						<ol>
						<?php
							for($i=0 ; $i <18 ;$i++)
							{
								$item = $mainLinks[$i];
								print "	<li><input style ='margin-left:-3px' type ='checkbox' name = 'id[]' value='$item' id ='$item'><b><label for ='$item' >$item</label></b></li>\n";
							}
						?>
						</ol>
						</td>
					</tr>
					<tr><td colspan = 2 align =center> <input type = submit name =addaccount value = Add>&nbsp; <input type = reset ></td></tr>
					</table>	
					
					</form>
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