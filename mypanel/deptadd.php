<?php
session_start();
include("myset.php");
$cid=$_POST["cid"];
$deptname=$_POST["deptname"];

$deptaddtxt="INSERT INTO depts VALUES('','$deptname','$cid','ltr','left')";
$deptadd=mysql_query($deptaddtxt);

$myfltrtxt="SELECT collegeid , deptid from depts where deptname='$deptname' and collegeid=$cid";
$myfltr=mysql_query($myfltrtxt);
while($rw=mysql_fetch_array($myfltr)){
$deptid=$rw["deptid"];
$cid=$rw["collegeid"];
}

$addlinktxt="INSERT INTO links VALUES('','home page','$cid','$deptid','<center><strong> Welcome to our department </strong></center>','ltr','left')";
$addlink=mysql_query($addlinktxt);
header("Location:main.php?mypage=collegeview&cid=$cid");
?>
