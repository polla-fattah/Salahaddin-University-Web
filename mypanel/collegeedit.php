<?php
session_start();
include("myset.php");
 $cid=$_GET["cid"];
			$collegelisttxt="select * from colleges where collegeid=$cid";
			$collegerow=mysql_query($collegelisttxt);
			while($collegerw=mysql_fetch_array($collegerow)){
				$collegeid=$collegerw["collegeid"];
				$collegename=$collegerw["collegename"];
				$collegecolor=$collegerw["collegecolor"];
				$collegebg=$collegerw["collegebg"];
	    		$collegedept=$collegerw["collegedept"];
				$collegeurl=$collegerw["collegeurl"];
				}
			?>

<html>
<head>
<title>MyPanel-version 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Author" content="Seerwan A. Khoshnaw">
<link href="myset.css" rel="stylesheet" type="text/css">
<script language="javascript" src="myscrpt.js"></script>
<SCRIPT language=Javascript src="ColorPicker2.js"></SCRIPT>

<SCRIPT language=JavaScript>
var cp = new ColorPicker('window'); // Popup window
var cp2 = new ColorPicker(); // DIV style
</SCRIPT>
</head>
<body bgcolor="#186BAD" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="90%" height="90%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top"><p>&nbsp;</p>      <form action="collegeedit.php?doupdate=1" method="post" enctype="multipart/form-data" name="form1">
                <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                  <tr>
                    <td align="center" valign="middle"><table width="100%"  border="0" cellspacing="5" cellpadding="3">
                      <tr>
                        <td width="44%"><p>College name </p></td>
                        <td width="56%"><p>
                            <input name="collegename" type="text" class="frmwrite" id="collegename" value="<?php echo $collegename; ?>" size="30">
                        </p></td>
                      </tr>
                      <tr>
                        <td><p>College color </p></td>
                        <td><p>
                            <input name="collegecolor" type="text" class="frmwrite" id="collegecolor" value="<?php echo $collegecolor; ?>" size="10">
                            <A id=pick2 
            onclick="cp2.select(document.forms[0].collegecolor,'pick2');return false;" 
            href="#" 
            name=pick2>Pick</A> </p></td>
                      </tr>
                      <tr>
                        <td><p>Background change ? </p></td>
                        <td><p>
                          <input name="chng" type="button" class="frmwrite" id="chng" onClick="changefile('collegebg','myfile','chng')" value="Yes">
                          <input name="collegebg" type="text" class="frmwrite" id="collegebg" value="<?php echo $collegebg; ?>" size="20" disabled="true" readonly="true">
</p></td>
                      </tr>
                      <tr>
                        <td><p>College background (mix) </p></td>
                        <td><p>
                            <input name="myfile" type="file" class="frmwrite" id="myfile" disabled="true">
                        </p></td>
                      </tr>
                      <tr>
                        <td><p>Have department ? (Yes/No) </p></td>
                        <td><p>
                            <select name="collegedept" id="collegedept">
                              <option>yes</option>
							  <option>no</option>
                              <option selected><?php echo $collegedept; ?></option>
                            </select>
                        </p></td>
                      </tr>
                      <tr>
                        <td><p>Official website if available</p></td>
                        <td><p>
                            <input name="collegeurl" type="text" class="frmwrite" id="collegeurl" value="<?php echo $collegeurl; ?>" size="30">
                        </p></td>
                      </tr>
                      <tr>
                        <td><p>
                          <input name="collegeid" type="hidden" id="collegeid" value="<?php echo $cid; ?>">
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
                <SCRIPT language=JavaScript>cp.writeDiv()</SCRIPT>
    </form>    
    <p>
      <?php
if(isset($_GET["doupdate"])){
$collegeid=$_POST["collegeid"];
$collegename=$_POST["collegename"];
$collegecolor=$_POST["collegecolor"];
$collegedept=$_POST["collegedept"];
$collegeurl=$_POST["collegeurl"];

if(isset($_POST["collegebg"])){
$collegebg=myupload("myfile","../bg/");
$txt="UPDATE colleges SET collegename='$collegename' , collegecolor='$collegecolor' , collegebg='$collegebg' , collegedept='$collegedept' , collegeurl='$collegeurl' WHERE collegeid=$collegeid";
}
else
{
$txt="UPDATE colleges SET collegename='$collegename' , collegecolor='$collegecolor' , collegedept='$collegedept' , collegeurl='$collegeurl' WHERE collegeid=$collegeid";
}

$collegerw=mysql_query($txt);
?>      
      <script language="javascript">window.close();</script>
      <?php 
}

?>
    </p></td>
  </tr>
</table>
</body>
</html>