<?php
session_start();
include("myset.php");
$linkid=$_GET["linkid"];
$cid=$_GET["cid"];
$did=$_GET["did"];

if($did==0){
$direction="main.php?mypage=collegeview&cid=$cid";
}
else 
{
$direction="main.php?mypage=deptview&cid=$cid&did=$did";
}

$linkdeltxt="delete from links where linkid=$linkid";
$linkdel=mysql_query($linkdeltxt);
header("Location:$direction");
?>
