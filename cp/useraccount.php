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

<?php
	if(isset($_POST['addaccount']) and $_POST['addaccount']=='Add')
	{
		$uname = trim($_REQUEST['uname']);
		$uid = trim($_REQUEST['uid']);
		$pas1 = trim($_REQUEST['pas1']);
		$pas2 = trim($_REQUEST['pas2']);
		if($uname=="")
			die("<script>window.location ='addaccount.php?m=2';</script>");
		if($uid=="")
			die("<script>window.location ='addaccount.php?m=3';</script>");
		if($pas1=="")
			die("<script>window.location ='addaccount.php?m=4';</script>");
		if($pas1!=$pas2)
			die("<script>window.location ='addaccount.php?m=5';</script>");
		if(isset($_REQUEST['id']))
		{
			@ $id = $_REQUEST['id'];
			$privliged = "";
			$betrue="";
			foreach($id as $value)
			{
				$betrue = "$betrue,'t' ";
				$privliged = "$privliged, `$value`";
			}
	
				$query = "insert into users(id, name, pass $privliged) values('$uid', '$uname', '$pas1' $betrue)";
			mysql_query($query) or die("<script>window.location ='addaccount.php?m=6';</script>");
		}
		else
		{
			die("<script>window.location ='addaccount.php?m=1';</script>");
		}
	}
	else if(isset($_POST['changeaccount']) and $_POST['changeaccount']=='Change')
	{
		$uname = trim($_REQUEST['uname']);
		$uid = trim($_REQUEST['uid']);
		$pas1 = trim($_REQUEST['pas1']);
		$pas2 = trim($_REQUEST['pas2']);
		if($uname=="")
			die("<script>window.location ='editaccount.php?m=2&uid=$uid';</script>");
		if($uid=="")
			die("<script>window.location ='editaccount.php?m=3&uid=$uid';</script>");
		if($pas1=="")
			die("<script>window.location ='editaccount.php?m=4&uid=$uid';</script>");
		if($pas1!=$pas2)
			die("<script>window.location ='editaccount.php?m=5&uid=$uid';</script>");
		if(isset($_REQUEST['id']))
		{
			@ $id = $_REQUEST['id'];
			$privliged = "";
			$betrue="";
			foreach($id as $value)
			{
				$betrue = "$betrue,'t' ";
				$privliged = "$privliged, `$value`";
			}
			mysql_query("Delete from users where id='$uid'") or die(mysql_error());
				mysql_query("insert into users(id, name, pass $privliged) values('$uid', '$uname', '$pas1' $betrue)") or die("<script>window.location ='editaccount.php?m=6&uid=$uid';</script>");
		}
		else
		{
			die("<script>window.location ='editaccount.php?m=1&uid=$uid';</script>");
		}
	}
	else if(isset($_REQUEST['id']) && isset($_REQUEST['delete']))
	{
		@ $id = $_REQUEST['id'];
		$deleted = "'-100'";
		foreach($id as $value)
			$deleted = "$deleted, '$value'";
		$query = "Delete from users where id IN ($deleted)";
		mysql_query($query) or die(mysql_error());
	}
	
	$users=mysql_query("Select id,name from users") or die(mysql_error());

?>
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
		<font face="Albany" size="3" color="#000080">User Account</font></b></td>
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
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Accounts</font></td>
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
						<a href = 'addaccount.php'><font face="arial" size =2> <b>New</b></a></font></p>
						<table border = 1 cellpadding = 1 cellspacing =0 width =98%>
						<form action = useraccount.php method =post> 
						<tr>
								<th width=34 ><input type=submit name = delete value = Del style='cursor:pointer;font-weight: bold; color: #0000FF; border: 0px solid #FFFFFF; padding: 0px; background-color: #FFFFFF'></th>
							<th width="32">Edit</th>
							<th width='146'>User ID</th>
							<th width='322'>User Name</th>
						</tr>
						<?php
							$color ="";
							while($user= mysql_fetch_array($users))
							{
								if($user['id']=='admin')continue;
								$color = (($color == "#EEEEEE")?"#CCCCCC" : "#EEEEEE");
								print "<tr bgcolor =$color><td width=20 align = center><input  type =checkbox name = id[] value = $user[id]></td>";
								print "<td align = center><a href = 'editaccount.php?uid=$user[id]' style='text-decoration:none;'>Edit</a></td>";
								print "<td width=273>$user[id]</td>";
								print "<td width=273>$user[name]</td>";
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