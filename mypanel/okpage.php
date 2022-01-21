<?php
session_start();
function filterx($x){
$x=htmlentities($x);
$x=strip_tags($x);
$x=addslashes($x);
return $x;
}
$usrname=$_POST['usrname'];
$passwd=$_POST['passwd'];
$usrname=filterx($usrname);
$passwd=filterx($passwd);
$dbase="salahaddin";
$_SESSION['usrname']=$usrname;
$_SESSION['passwd']=$passwd;
$_SESSION['dbase']=$dbase;
	
		@mysql_connect("mysql",$usrname,$passwd);
		if(@mysql_select_db($dbase)) 
		{
			header("Location:main.php");
		}
		else
		{
			header("Location:error.php");
		}
		?>
