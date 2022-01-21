<?php
session_start();
include("myset.php");
?>

<html>
<head>
<title>MyPanel-version 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Author" content="Seerwan A. Khoshnaw">
<link href="myset.css" rel="stylesheet" type="text/css">
<script language="javascript" src="myscrpt.js"></script>

</head>
</head>
<body bgcolor="#186BAD" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="90%" height="90%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top"><p><strong>File Upload System </strong></p>
      <p><a href="uploader.php"><strong>Add New Ffiles - Back </strong></a></p>
      <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                  <tr>
                    <td align="center" valign="middle">
					<?php
echo "The function start from here ... <br>";
$f=$_POST["f"];
$fno=$f+1;
for($i=1;$i<$fno;$i++){
myupload('myfile'.$i,'../photos/');
}
?>
</td>
                  </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>