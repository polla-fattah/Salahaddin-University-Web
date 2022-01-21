<?php
session_start();
include("myset.php");
$did=$_GET["did"];
$cid=$_GET["cid"];

$deptdeltxt="delete from depts where deptid=$did";
$deptdel=mysql_query($deptdeltxt);
header("Location:main.php?mypage=collegeview&cid=$cid");
?>
