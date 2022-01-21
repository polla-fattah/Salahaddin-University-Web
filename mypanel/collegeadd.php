<?php
session_start();
include("myset.php");
$collegename=$_POST["collegename"];
$collegecolor=$_POST["collegecolor"];
$collegedept=$_POST["collegedept"];
$collegerul=$_POST["collegerul"];

if($collegecolor==""){$collegecolor="#ffffff";}
$collegebgname=myupload("collegebg","../bg/");

$collegeaddtxt="INSERT INTO colleges VALUES('','$collegename','$collegecolor','$collegebgname','$collegedept','$collegerul')";
$collegeadddo=mysql_query($collegeaddtxt);

$myfltrtxt="SELECT collegeid from colleges where collegename='$collegename' and collegecolor='$collegecolor'";
$myfltr=mysql_query($myfltrtxt);
while($rw=mysql_fetch_array($myfltr)){
$collegeid=$rw["collegeid"];
}

$addlinktxt="INSERT INTO links VALUES('','home page','$collegeid','0','<center><strong> Welcome to our college </strong></center>','ltr','left')";
$addlink=mysql_query($addlinktxt);

?>
<script language="javascript">document.location="main.php?mypage=collegelist";</script>