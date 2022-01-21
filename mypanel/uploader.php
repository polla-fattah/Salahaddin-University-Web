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
    <td align="center" valign="top"><p><strong>File Upload System </strong></p>      <form action="uploadcount.php" method="post" name="form1">
                <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                  <tr>
                    <td align="center" valign="middle"><table width="100%"  border="0" cellspacing="5" cellpadding="3">
                      <tr>
                        <td width="11%"><p>Pictures</p></td>
                        <td width="89%"><p>
                            <select name="pic" class="frmwrite" id="pic">
                              <option selected>no</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                            </select>
                        </p></td>
                      </tr>
                      <tr>
                        <td><p>&nbsp;
</p></td>
                        <td><p>&nbsp;</p></td>
                      </tr>
                      <tr align="center" valign="middle">
                        <td><p>
                            <input name="Submit" type="submit" class="frmwrite" value="Add">
                        </p></td>
                        <td><p>
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