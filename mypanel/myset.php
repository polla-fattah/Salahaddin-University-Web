<?php
//default connection
@mysql_connect("mysql",$usrname,$passwd);
$myconnect=mysql_select_db($dbase);
if(!$myconnect)
{ die("You are not authorized to view this page");}

//function for preventing XSS & SQL attacks
function filterx($x){
$x=htmlentities($x);
$x=strip_tags($x);
$x=addslashes($x);
return $x;
}

//function for uploadding files
function myupload($myfile,$mydir){
$ftype=$_FILES[$myfile]['type'];
$ftmp=$_FILES[$myfile]['tmp_name'];
$fname=$_FILES[$myfile]['name'];
$theurl="http://www.salahaddin-ac.com/photos/";
$mymode=array('image/pjpeg','image/gif','application/pdf','application/msword','application/vnd.ms-powerpoint','application/vnd.ms-excel','application/x-zip-compressed');
echo "<br>the name is: ".$fname;
echo "<br> the type is: ".$ftype;
echo "<br> the tmp is: ".$ftmp."<br>";
if($fname==""){
return $fname="no";
}
if(file_exists($mydir.$fname))
{echo "<p align='center'><b><font color='#cc0000'>The file which you sent already exists in the directory please rename and send again ...</font></b></p>";
exit() ;}

if(! in_array($ftype,$mymode))
{echo "<p align='center'><b><font color='#cc0000'>The file which you sent dosen't allowed file type (must be photo or doc) ...</font></b></p>";
exit() ;}

if(move_uploaded_file($ftmp,$mydir.$fname))
{echo "<p align='center'><b><font color='#green'>The file uploaded successfully to server side.</font></b></p>";
echo "<p align='center'><b><font color='black'>copy this below url for photo path in the pop up textbox</font></b></p>";
echo "<p align='center'><b><font color='blue'>".$theurl.$fname."</font></b></p>";
chmod($mydir.$fname,0644);
echo "<hr width='200' height='1' color='black' align='center'>";

}
else
{echo "<p align='center'><b><font color='#cc0000'>You Have Error , The file couldn't be uploaded , please try again ...</font></b></p>";
exit();}

return $fname;
}
?>