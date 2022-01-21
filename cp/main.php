<?php
	session_start();
	
	include("config.php");
	if(isset($_SESSION['u']) and isset($_SESSION['p']) and isset($_REQUEST['subject']) )
	{
		$user = $_SESSION['u'];
		$pass = $_SESSION['p'];
		$subject = $_REQUEST['subject'];
		$sub = $mainLinks[$subject];
		$check = mysql_query("Select id from users where id ='$user' and pass = '$pass' and `$sub` ='t'");
		if(!($check = mysql_fetch_array($check)))
		{
			session_destroy();
				die("<center><font color = red size =5><b>If you think that you have privlage to see this page please <a href = index.php>Ligin</a> then go back</b></font></center>");
		}
	}
	else
	{
		session_destroy();
			die("<center><font color = red size =5><b>If you think that you have privlage to see this page please <a href = index.php>Ligin</a> then go back</b></font></center>");
	}
	$_SESSION['super'] = $subject;
	////////////////////////////////
	if(isset($_POST['addnew']) and $_POST['addnew']=='Add')
	{
		$con = str_replace("../acbhzxt/","acbhzxt/",$_POST['context']);
		$abriv = str_replace("../acbhzxt/","acbhzxt/",$_POST['abriv']);
			$query = "insert into subjects(super, title, abriv, context,lmb) values('$_REQUEST[subject]', '$_POST[title]', '$abriv', '$con','$_SESSION[n]')";
		mysql_query($query) or die(mysql_error());
	}
	else if(isset($_REQUEST['id']) && isset($_REQUEST['delete']))
	{
		@ $id = $_REQUEST['id'];
		$deleted = '-100';
		foreach($id as $value)
			$deleted = "$deleted, $value";
		$query = "Delete from subjects where id IN ($deleted)";
		mysql_query($query) or die(mysql_error());
		
		$query = "Delete from subjects where super IN ($deleted)";
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
		<font face="Albany" size="2">
		<a href  =control.php>Control Panel</a></font></td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<b>
		<font face="Albany" size="3" color="#000080"><?php print $mainLinks["$subject"]; ?></font></b></td>
	<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
			<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
	</td>
</tr>
<tr>
	<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">
	<table border = 0 cellpadding = 0 cellspacing = 0 width = 100%>
	<tr>
		<td><!---Body of the work--->
			<?php
				$currentsub = mysql_query("Select id, context from subjects where id = $subject");
				$currentsub = mysql_fetch_array($currentsub);
				if($currentsub['context'] =="multi007list")
				{
					include("list.php");
				}
				else
				{
					include("text.php");
				}
			?>
		
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>