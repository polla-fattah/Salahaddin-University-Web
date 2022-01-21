<?php
session_start();
include("myset.php");
$linkname=$_POST["linkname"];
$cid=$_POST["cid"];
$did=$_POST["did"];
$thedata=$_POST["mydata"];
$dir=$_POST["dir"];
$align=$_POST["align"];


$linkaddtxt="INSERT INTO links VALUES('','$linkname','$cid','$did','$thedata','$dir','$$align')";
$linkadddo=mysql_query($linkaddtxt);

if($linkadddo){
header("Location:linkaddc.php?cid=$cid&did=$did&ok=1");
}
else
{
header("Location:linkaddc.php?cid=$cid&did=$did&ok=2");
}
?>
