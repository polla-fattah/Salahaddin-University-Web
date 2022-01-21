<?php
session_start();
include("myset.php");
 $did=$_GET["did"];
			$depttxt="select * from depts where deptid=$did";
			$deptrow=mysql_query($depttxt);
			while($deptrw=mysql_fetch_array($deptrow)){
				$deptname=$deptrw["deptname"];
				}
			?>

<html>
<head>
<title>MyPanel-version 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Author" content="Seerwan A. Khoshnaw">
<link href="myset.css" rel="stylesheet" type="text/css">
<script language="javascript" src="myscrpt.js"></script>
</head>
<body bgcolor="#186BAD" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="90%" height="90%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top"><p>&nbsp;</p>      <form action="deptedit.php?doupdate=1" method="post" name="form1">
                <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                  <tr>
                    <td align="center" valign="middle"><table width="100%"  border="0" cellspacing="5" cellpadding="3">
                      <tr>
                        <td width="44%"><p>Dept. name </p></td>
                        <td width="56%"><p>
                            <input name="deptname" type="text" class="frmwrite" id="deptname" value="<?php echo $deptname; ?>" size="30">
                        </p></td>
                      </tr>
                      <tr>
                        <td><p>
                          <input name="did" type="hidden" id="did" value="<?php echo $did; ?>">
</p></td>
                        <td><p>&nbsp;</p></td>
                      </tr>
                      <tr align="center" valign="middle">
                        <td><p>
                            <input name="Submit" type="submit" class="frmwrite" value="Edit">
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
<?php
if(isset($_GET["doupdate"])){
$did=$_POST["did"];
$deptname=$_POST["deptname"];

$txt="UPDATE depts SET deptname='$deptname' WHERE deptid=$did";

$deptrw=mysql_query($txt);
?>
<script language="javascript">window.close();</script>
<?php 
}

?>
</body>
</html>