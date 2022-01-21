<?php 
$mm=mysql_connect("mysql","admin","sefin321");
if($mm){

$db="salahaddin";
mysql_select_db($db);
if(isset($_GET["cid"]))
{
$cid= $_GET["cid"];

//filter the request
if(!is_numeric($cid) )
{
echo "<script language='javascript'>window.location='index.php';</script>";
}//end of filter

}
else
{
$cid=0;
echo "<script language='javascript'>window.location='index.php';</script>";

}
$txtcollege="select * from colleges where collegeid=". $cid;
$mycollege=mysql_query($txtcollege);
while($rowcollege=mysql_fetch_array($mycollege)){ // start college loop
$collegeid=$rowcollege["collegeid"];
$collegename=$rowcollege["collegename"];
$collegeurl=$rowcollege["collegeurl"];
$collegedept=$rowcollege["collegedept"];
$collegecolor=$rowcollege["collegecolor"];
$collegebg=$rowcollege["collegebg"];
} // end college loop

if($collegedept=="yes"){
$thedeptlinkstxt="select * from depts where collegeid=".$cid;
$mydeptlnk=mysql_query($thedeptlinkstxt);
}



if(isset($_GET["did"])){ //start department detection
$mydept=$_GET["did"];

//filter the request
if(!is_numeric($mydept) )
{
echo "<script language='javascript'>window.location='index.php';</script>";
}//end of filter

$txtlink="select linkid , linkname , linkdata , dir , align from links where collegeid=". $cid." and deptid=".$mydept." order by linkid";
}
else
{
$txtlink="select linkid , linkname , linkdata , dir , align from links where collegeid=". $cid." and deptid=0 order by linkid";
} // end of department detection


$mylink=mysql_query($txtlink);

if(isset($_GET["linkid"])){ // start of link data extractor
$mylnkid=$_GET["linkid"];

//filter the request
if(!is_numeric($mylnkid) )
{
echo "<script language='javascript'>window.location='index.php';</script>";
} //end of filter

$mylnktxt="select linkdata from links where linkid=".$mylnkid;
$rwlnk=mysql_query($mylnktxt);
while($rwlnkselected=mysql_fetch_array($rwlnk)){
$linkdata=$rwlnkselected["linkdata"];
}
}
else
{
if(isset($mydept))
{$mylnktxt="select linkdata from links where collegeid=".$cid." and linkname='home page' and deptid=".$mydept;}
else
{$mylnktxt="select linkdata from links where collegeid=".$cid." and linkname='home page' and deptid=0";}


$rwlnk=mysql_query($mylnktxt);
while($rwlnkselected=mysql_fetch_array($rwlnk)){
$linkdata=$rwlnkselected["linkdata"];
}
} // end of link data extractor

}
else
{
echo "FAILURE";
}
?>
