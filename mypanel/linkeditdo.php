<?php
session_start();
include("myset.php");
if(isset($_POST["doupdate"])){
$linkid=$_POST["linkid"];
$linkname=$_POST["linkname"];
$linkdata=$_POST["mydata"];
$dir=$_POST["dir"];
$align=$_POST["align"];

$txt="UPDATE links SET linkname='$linkname' , linkdata='$linkdata' , dir='$dir' , align='$align' WHERE linkid=$linkid";

$linkrw=mysql_query($txt);
header("Location:linkedit.php?linkid=$linkid");
}
?>

