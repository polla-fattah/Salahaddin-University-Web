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
    <td align="center" valign="top"><p><strong>File Upload System </strong></p>      <form action="uploaddo.php" method="post" enctype="multipart/form-data" name="form1">
                <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                  <tr>
                    <td align="center" valign="middle"><table width="100%"  border="0" cellspacing="5" cellpadding="3">
                      <tr>
                        <td colspan="2"><?php 
 if(isset($_POST["pic"]))
 {
 $f=$_POST["pic"];
 $fno=$f+1;
 for($i=1;$i<$fno;$i++){

 ?>
  <p><?php echo " the file-".$i ; ?>
    <input name="myfile<?php echo $i; ?>" type="file" class="frmwrite" id="myfile<?php echo $i; ?>">
  </p>
  
  <?php
  } //end of for loop
  ?>
    <input type="hidden" name="f" id="f" value="<?php echo $f; ?>"> 
  <?php
  } //end of if
  ?></td>
                      </tr>
                      <tr align="center" valign="middle">
                        <td width="11%"><p>
                            <input name="Submit" type="submit" class="frmwrite" value="Add">
                        </p></td>
                        <td width="89%"><p>
                            <input name="Submit2" type="reset" class="frmwrite" value="Cancel all">
                        </p></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
    </form></td>
  </tr>
</table>
</body>
</html>