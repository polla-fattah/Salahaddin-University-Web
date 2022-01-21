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
<SCRIPT language=Javascript src="ColorPicker2.js"></SCRIPT>

<SCRIPT language=JavaScript>
var cp = new ColorPicker('window'); // Popup window
var cp2 = new ColorPicker(); // DIV style
</SCRIPT>
</head>
<body bgcolor="#CCCCCC" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="819" height="600" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td width="108">
			<img src="images/h1.jpg" width="108" height="120" alt=""></td>
		<td width="107">
			<img src="images/h2.jpg" width="107" height="120" alt=""></td>
		<td width="108">
			<img src="images/h3.jpg" width="108" height="120" alt=""></td>
		<td width="107">
			<img src="images/h4.jpg" width="107" height="120" alt=""></td>
		<td width="389" height="120" bgcolor="#186BAD">&nbsp;			</td>
	</tr>
	<tr>
		<td height="20" colspan="5" style="background-image:url(images/bgbar.jpg); background-repeat:repeat-x "><?php include("menu.php"); ?></td>
	</tr>
	<tr align="left" valign="top" bgcolor="#FFFFFF">
	  <td height="441" colspan="5">
	    <p>&nbsp;</p>
	    <p>
          <?php
	  if(isset($_GET["mypage"])){
	  $mypage=filterx($_GET["mypage"]);
	  $mypage=$mypage.".php";
	  }
	  else
	  {
	  $mypage="collegelist.php";
	  }
	  @include($mypage);
	  ?>
</p>	    
	    
      </td>
	</tr>
	<tr align="center" valign="middle" bgcolor="#186BAD">
	  <td height="19" colspan="5">			<p class="small"><font color="#FFFFFF">copyright&copy; Salahaddin University - - - Designed and Developed by SIRWAN A. KHOSHNAW </font></p></td>
  </tr>
</table>
</body>
</html>