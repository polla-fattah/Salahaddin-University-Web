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
$massage = 0;
if(isset($_REQUEST['addpic']))
{
$allowed_file_type = array('image/gif','image/pjpeg','image/jpeg','image/png','image/jpg'); 
$target = "../acbhzxt/";
if(isset($_FILES['uploaded']) and (basename( $_FILES['uploaded']['name']) != ""))
{ 
$target = $target . basename( $_FILES['uploaded']['name']) ;
$uploaded_type = $_FILES['uploaded']['type'];
if(empty($uploaded_type))
$massage = 2;
if ((!in_array($_FILES['uploaded']['type'],$allowed_file_type)))
$massage = 3;
if (file_exists("../acbhzxt/" . $_FILES["uploaded"]["name"]))
$massage = 4;
if($massage == 0)
if(!move_uploaded_file($_FILES['uploaded']['tmp_name'], "../acbhzxt/".$_FILES["uploaded"]["name"]))
$massage = 6;
else
    chmod("../acbhzxt/".$_FILES["uploaded"]["name"] ,0644);

if($massage == 0)
{
$insertion="insert into images (name,addedby) values('".$_FILES["uploaded"]["name"]."','$_SESSION[u]')";
print $insertion;
mysql_query($insertion) or $massage = 5;
$massage = 7;
}
}
else
{
$massage = 1;
}
}
if(isset($_REQUEST['delete']) and isset($_REQUEST['id']))
{
@ $id = $_REQUEST['id'];
$in = "-100";
foreach($id as $value)
$in = "$in, $value";
$names = mysql_query("Select name from images where id in($in)") or die(mysql_error());
while($name = mysql_fetch_array($names))
unlink("../acbhzxt/$name[name]");
mysql_query("delete from images where id in($in)") or die(mysql_error());
}
if($_SESSION['u']=='admin')
$condition = "";
else
$condition = "where addedby='$_SESSION[u]'";
$pageNumber = isset($_REQUEST['pageNumber']) ? $_REQUEST['pageNumber'] : 0;
$showNum =20;
$startFrom = ($pageNumber * $showNum);
$q="SELECT * from images $condition ORDER By id desc Limit $startFrom, $showNum;";
$rs=mysql_query($q) or die(mysql_error());
$nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action

$pageCount = mysql_query("select count(*) as pc from images $condition");
$pageCount = mysql_fetch_array($pageCount);
$pageCount = (floor($pageCount['pc']/$showNum)==($pageCount['pc']/$showNum)?(floor($pageCount['pc']/$showNum)-1):(floor($pageCount['pc']/$showNum)));
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Picture Manager</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA >
<tr>
<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
&nbsp;</td>
<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
<b><font face="Albany" color="#000080">Picture Manager</font></b></td>
<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
</td>
</tr>
<tr>
<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">
<table border = 0 cellpadding = 0 cellspacing = 0 width = 100% height =400>
<tr>
<td><br><!---Body of the work--->
<table align = center width = 96% cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
<tr>
<td>
<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
<tr>
<td background = 'images/top-left.gif' width = 16></td>
<td background = 'images/top-center.gif' > 
<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Pictures</font></td>
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
<table border = 0 cellpadding = 7 cellspacing =0 width =98%>
<form action = PicManager.php method =post enctype="multipart/form-data">
<tr><td colspan = 4 style="border: 1px solid #000000"><input type = submit name = delete value = Del>&nbsp;&nbsp;<font size="5">|
</font>&nbsp;
<input type = submit name = addpic value = Add>
<input type ='file' name = 'uploaded' size="25">&nbsp;
<?php
switch($massage)
{
case 1:
print "<font color =red>Pleasee, select a picutre.</font>";
break;
case 2:
print "<font color =red>This is not a picture!</font>";
break;
case 3:
print "<font color =red>You can upload only image files!</font>";
break;
case 4:
print "<font color =red>This Picture is already exists!</font>";
break;
case 5:
print "<font color =red>Problem while uploading your Picture!</font>";
break;
case 6:
print "<font color =red>Problem while uploading your Picture!</font>";
break;
case 7:
print "<font color =green>Your Picture is uploaded!</font>";
break;
}
?>
</td></tr>
<?php
$i=0;
while($img= mysql_fetch_array($rs))
{
if($i % 4 == 0)
print "<tr>";

print "<td width=25% align = center><img border = 1 src ='../acbhzxt/$img[name]' width = 150 height = 150><br>";
print "<input type = checkbox name = 'id[]' value = '$img[id]'> ";
print "<input type = text value='../acbhzxt/$img[name]' style='width:100px'>";
if($_SESSION['u']=='admin')
print "<br><font size = 2 color =#888866>Added By:$img[addedby]</font>";
$i++;
}

print "<tr><td colspan = 4 align=center>";

if($pageNumber == 0)
{
print "&#171; Previous";
}
else
{
$pn = $pageNumber - 1;
print "<a href ='picmanager.php?pageNumber=$pn'>&#171; Previous</a>";
} 

print "<span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span>";

if($pageNumber == $pageCount )
{
print "Next &raquo;";
}
else
{
$pn = $pageNumber + 1;
print "<a href='picmanager.php?pageNumber=$pn'>Next &raquo;</a>";
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
