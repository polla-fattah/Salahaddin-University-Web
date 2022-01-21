<?php include("include/config.php"); ?>







<html>



<head>



	<title>SALAHADDIN UNIVERSITY - زانكۆی سه‌لاحه‌ددين</title>



	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



	<link href="include/myset.css" rel="stylesheet" type="text/css">



	<script language="javascript" src="include/myscrpt.js"></script>



</head>



<body bgcolor="#cccccc" leftmargin="0" topmargin="15" marginwidth="0" marginheight="15" class="thescroll">



	<table width="800" height="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">



	<tr>



		<td width="180" height="600" rowspan="2" align="center" valign="top" bgcolor="#9B2E2B"><?php include("include/right.php"); ?></td>



		<td width="620" height="150" align="center" valign="middle"><?php include("include/header.php"); ?></td>



	</tr>



	<tr>



		<td width="620" height="700" align="center" valign="top">



		  <table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">



		<tr>



			<td height="50" align="right" valign="top"><?php include("include/hmenu.php"); ?></td>



		</tr>



		<tr>



			<td align="left" valign="top" style="padding-left:18px;padding-right:15px ">



				<div class="titlebox" id="ptitle"> <?php echo $mainLinks[$main]; ?>   



				<?php



					if(isset($_REQUEST['a']) and !main_is_list($main))//second condition special for news



					{



						$add = mysql_query("Select * from subjects where id=$_REQUEST[a]") or die(mysql_error());



						$add = mysql_fetch_array($add);



						print " <font face=Tahoma>—</font>&gt; $add[title]";



					}



				?>



				</div>



				<!-------------------Start Additional Links---------------------------->



				<?php



				if(!main_is_list($main))



				{



					$links ="";



					$aditionals = mysql_query("Select id, title from subjects where super=$main order by seq, id");



					while($addition = mysql_fetch_array($aditionals))



							$links = $links."<tr><td align=left valign=middle><p><a href='index.php?m=$main&a=$addition[id]&s=$addition[id]' class=BlackLnk>&raquo; $addition[title] </a></p></td></tr>\n";



					if(	$links != "")



					{



				?>



						<div class="linkbox" id="studentlnk">



							<table width="150"  border="0" align="center" cellpadding="0" cellspacing="0">



							<tr>



								<td width="11%" align="center" valign="middle" bgcolor="#eeeeee" ></td>



									<td width="76%" align="center" valign="middle" bgcolor="#eeeeee"><p class="title"><font color="#0033FF"><b>Additional Links </b></font></p></td>



								<td width="13%" align="left" valign="middle" bgcolor="#eeeeee"><img src="img/arrw-b/down.gif" width="7" height="7"></td>



							</tr>



							<tr align="center" valign="top" class="title">



							<td colspan="3">



							<table width="100%"  border="0" cellpadding="0" cellspacing="1" class="BlackLnk">



							<?php print $links ;?>



							</table>



							</td>



							</tr>



							</table>



						</div>



				



				<?php



					}//end of if(	$links != "")



				}//end of if(!main_is_list($main))



				?>



				<!-------------------End of Additional Links---------------------------->







				<p>



				<?php



					$context = mysql_query("Select context from subjects where id = $subject");



					$context = mysql_fetch_array($context);



					$context = $context['context'];







					if($mainLinks[$main]=="Home Page")



					{



						$Announce = mysql_query("Select abriv from subjects where id = $subject");



						$Announce = mysql_fetch_array($Announce);







						include("include/home.php");



					}



					else if($main=="2")

					{

						include("include/colleges.php");



					}

					else if($mainLinks[$main]=="Site Map")



					{



						include("include/sitemap.php");



					}



					else if($context == "multi007list")



					{



						include("include/multi.php");



					}



					else



					{



						print $context;



					}



				



				?>



				



				</p>



			</td>



		</tr>



		<tr>



			<td height="70" align="center" valign="middle" class="title"><span class="publicbox">



				<?php



					include("include/footer.php");



				?>



			</span></td>



		</tr>



		</table>	</td>



	</tr>



	</table>



</body>



</html>



