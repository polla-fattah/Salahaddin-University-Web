<?php 
include("include/myconnect.php");
?>
<html>
<head>
<title>SALAHADDIN UNIVERSITY - زانكۆی سه‌لاحه‌ددين</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="include/myset.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/myscrpt.js"></script>
</head>
<body leftmargin="0" style="background-image:url(bg/<?php echo $collegebg; ?>); background-repeat:repeat-x;" bgcolor="<?php echo $collegecolor;?>" topmargin="5" marginwidth="0" marginheight="5" class="thescroll">
<table width="780" height="101" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="29" rowspan="3" align="left" valign="middle"><img src="img/colleges/corner/left.gif" width="29" height="101"></td>
    <td height="20" bgcolor="#FFFFFF" style="background-image:url(img/colleges/corner/line-top.gif); background-repeat:repeat-x "></td>
    <td width="29" rowspan="3" align="right" valign="middle"><img src="img/colleges/corner/rigth.gif" width="29" height="101"></td>
  </tr>
  <tr>
    <td height="61" align="center" valign="bottom" bgcolor="#FFFFFF"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><a href="http://www.salahaddin-ac.com"><img src="img/colleges/title.jpg" width="200" height="35" border="0" title="Salahaddin University Home Page"></a></td>
        <td align="right" valign="bottom"><p><?php if($collegeurl!=""){echo "Colleges Official Webiste: <a href='http://$collegeurl' class='blacklnk'>".$collegeurl."</a>";} ?></p></td>
      </tr>
      <tr align="center" valign="bottom">
        <td colspan="2"><table width="50%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="380" align="center" valign="bottom"><p style="font-size:12px "><strong><?php echo "<a href='college.php?cid=$cid'>College of ".$collegename."</a>"; ?></strong>
			<font color="#990033"><?php if(isset($mydept)){
		$myssql="select * from depts where deptid=$mydept";
		$mydeptrowdetect=mysql_query($myssql);
		while($mydeptrw=mysql_fetch_array($mydeptrowdetect)){
		$mydeptname=$mydeptrw["deptname"];
		}
		echo " \ ".$mydeptname;
		 }?></font>
			</p></td>
            <td width="20" bgcolor="<?php echo $collegecolor;?>">&nbsp;</td>
          </tr>
          <tr>
            <td height="2" bgcolor="<?php echo $collegecolor;?>"></td>
            <td height="2" bgcolor="<?php echo $collegecolor;?>"></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20" bgcolor="#FFFFFF" style="background-image:url(img/colleges/corner/line-bottom.gif); background-repeat:repeat-x "></td>
  </tr>
</table>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" height="10"></td>
  </tr>
  <tr>
    <td width="22" align="left" valign="top"><img src="img/colleges/border/ltop.gif" width="29" height="27"></td>
    <td height="27" align="right" valign="bottom" bgcolor="#FFFFFF" style="background-image:url(img/colleges/border/top.gif); background-repeat:repeat-x "><table width="100" border="0" cellspacing="0" cellpadding="0">
      <tr>
	  
        <td width="2"><img src="img/colleges/seperator.jpg" width="1" height="10"></td>
        <td width="6"><?php include("dept.php");?></td>
        <td><img src="img/colleges/arrow.jpg" width="8" height="8"></td>
        <td width="80" align="center" valign="middle"><p class="title"><strong><a href="#" onClick="dovw('dept')">Departments</a></strong></p></td>
        <td width="2"><img src="img/colleges/seperator.jpg" width="1" height="10"></td>
      </tr>
    </table></td>
    <td width="22" align="left" valign="top"><img src="img/colleges/border/rtop.gif" width="29" height="27"></td>
  </tr>
  <tr>
    <td style="background-image:url(img/colleges/border/left.gif); background-repeat:repeat-y "></td>
    <td height="400" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150" align="center" valign="top">
		<table width="100%"  border="0" cellspacing="0" cellpadding="2">
		<?php
		while($rowlink=mysql_fetch_array($mylink)){ // start link loop
$linkid=$rowlink["linkid"];
$linkname=$rowlink["linkname"];
$dir=$rowlink["dir"];
$align=$rowlink["align"];

if(isset($mydept)){
$linkstr="&did=".$mydept."&linkid=".$linkid;
}
else
{
$linkstr="&linkid=".$linkid;
}

if(isset($mylnkid)){
if($linkid==$mylnkid)
{
$mybga="#eaeaea";
}
else
{
$mybga="#ffffff";
}
}
else
{
$mybga="#ffffff";
}
?>
          <tr bgcolor="<?php echo $mybga;?>">
            <td align="<?php echo $align; ?>" valign="middle" dir="<?php echo $dir; ?>"><p class="title"><a href="college.php?cid=<?php echo $cid.$linkstr; ?>" class="menuvactive">&raquo; <?php echo $linkname;?> </a></p></td>
          </tr>
          <tr>
            <td align="left" valign="middle">
              <p><img src="img/colleges/vseperator.jpg" width="120" height="1"></p>            </td>
          </tr>
 <?php  
 }
 ?>         
        </table>
		
		</td>
        <td width="1" bgcolor="#eaeaea"></td>
        <td align="left" valign="top" style="padding-left:8; padding-right:8; padding-top:8 "><p><?php echo $linkdata; ?></p></td>
      </tr>
    </table></td>
    <td style="background-image:url(img/colleges/border/right.gif); background-repeat:repeat-y "></td>
  </tr>
  <tr>
    <td align="right" valign="top"><img src="img/colleges/border/lbottom.gif" width="29" height="27"></td>
    <td height="27" align="center" valign="middle" bgcolor="#FFFFFF" style=" background-image:url(img/colleges/border/bottom.gif); background-repeat:repeat-x; background-position:bottom"><p>copyright &copy; <a href="http://www.salahaddin-ac.com">SALAHADDIN UNIVERSITY</a></p></td>
    <td align="right" valign="top"><img src="img/colleges/border/rbottom.gif" width="29" height="27"></td>
  </tr>
</table>
</body>
</html>