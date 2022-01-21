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
	$pageNumber = isset($_REQUEST['pageNumber']) ? $_REQUEST['pageNumber'] : 0;
	$showNum =50;
	$startFrom = ($pageNumber * $showNum);

	$q="SELECT lmb,title from subjects ORDER By id desc Limit $startFrom, $showNum;";
	$rs=mysql_query($q) or die(mysql_error());

	$nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action
		
	$pageCount = mysql_query("select count(*) as pc from subjects");
	$pageCount = mysql_fetch_array($pageCount);
		$pageCount = (floor($pageCount['pc']/$showNum)==($pageCount['pc']/$showNum)?(floor($pageCount['pc']/$showNum)-1):(floor($pageCount['pc']/$showNum)));
?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Editng Tracker</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA >
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
		<a href  =control.php><font face="Albany" size="2">Control Panel</font></a></td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<b>
		<font face="Albany" size="3" color="#000080">Editing Tracker</font></b></td>
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
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Records</font></td>
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
							<th width='440'>Subject Title</th>
							<th width='192'>Last Modified By</th>
						</tr>
						<?php
							$color ="";
							while($edit= mysql_fetch_array($rs))
							{
								$color = (($color == "#EEEEEE")?"#CCCCCC" : "#EEEEEE");
								print "<tr bgcolor =$color><td>$edit[title]</td>";
								print "<td align = center>$edit[lmb]</td>";
							}
							print "<tr><td colspan = 3 align=center>";
							
							if($pageNumber == 0)
							{
								print "&#171; Previous";
							}
							else
							{
								$pn = $pageNumber - 1;
								print "<a href ='editingtracks.php?pageNumber=$pn'>&#171; Previous</a>";
							} 		
						
								print "<span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span>";
						
							if($pageNumber == $pageCount )
							{
								print "Next &raquo;";
							}
							else
							{
								$pn = $pageNumber + 1;
								print "<a href='editingtracks.php?pageNumber=$pn'>Next &raquo;</a>";
							}
							print "</tr></td>";

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