<?php
session_start();
include("myset.php");
$collegeid=$_GET["cid"];


$collegedeltxt="delete from colleges where collegeid=$collegeid";
$collegedel=mysql_query($collegedeltxt);
header("Location:main.php?mypage=collegelist");
?>
