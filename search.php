<?php
	include("include/config.php"); 
	$result = "";
	function getcondition($input)
	{
		$result = "";
		$conditions = explode(' ', $input);
		$si = count($conditions);								
		
		for($i = 0 ; $i < $si ; $i++ )
		{
			$result .= "(title like '%".$conditions[$i]."%' or context like '%".$conditions[$i]."%')";
			if($i < $si - 1)
				$result .= " and ";
		}
		return $result ;
	}
	
	if(isset($_REQUEST['pageNumber']))
	{
		$con = str_replace("_", " ", $_REQUEST['con']);
		$pageNumber = $_REQUEST['pageNumber'];
	}
	else
	{
		$con = trim($_REQUEST['con']);
		
		$seperators = array(";", ",", ".", "!", "?", "'", ":");
		$con = str_replace($seperators , " ", $_REQUEST['con']);
		$pageNumber = 0;
	}
			
		

 ?>

<html>
<head>
<title>SALAHADDIN UNIVERSITY - زانكۆی سه‌لاحه‌ددين</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="include/myset.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/myscrpt.js"></script>
<style type="text/css">
<!--
.style1 {color: #333333}
-->
</style>
</head>
<body bgcolor="#cccccc" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" class="thescroll">
<table width="800" height="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="180" height="600" rowspan="2" align="center" valign="top" bgcolor="#9B2E2B"><?php include("include/right.php"); ?></td>
    <td width="620" height="150" align="center" valign="middle"><?php include("include/header.php"); ?></td>
  </tr>
  <tr>
    <td width="620" height="450" align="center" valign="top"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" align="right" valign="top"><?php include("include/hmenu.php"); ?></td>
      </tr>
      <tr>
        <td align="left" valign="top" style="padding-left:18px "><div class="titlebox" id="ptitle">Search result    -&gt; </div> 
        <p>
        <table border = 0 cellpadding = 0 cellspacing =0 width =98%>
        <?php
        
        	if($con != "")
			{
				$showNum = 10;
				$startFrom = ($pageNumber * $showNum);

				$result = "where  ".getcondition($con);

				$q = "Select id,super, title, abriv from subjects $result  ORDER BY id DESC Limit $startFrom, $showNum";
				$list=mysql_query($q) or die(mysql_error());

				$nr = mysql_num_rows($list); //Number of rows found with LIMIT in action
					
				$pageCount = mysql_query("select count(*) as pc from subjects $result");
				$pageCount = mysql_fetch_array($pageCount);
			
				if(floor($pageCount['pc']/$showNum) == ($pageCount['pc']/$showNum))
					$pageCount = ($pageCount['pc']/$showNum)-1;
				else
					$pageCount = floor($pageCount['pc']/$showNum);
			
				while ($item = mysql_fetch_array($list))
				{
			?>
					<tr><td style='padding-top: 5px;'>
					
							<b><font face='Times New Roman' size='4' color='#9B2E2B'>&raquo; <a href ='index.php?<?php 
							if($item['id'] < 19)
							{
								print "m=$item[id]&";
							}
							else if($item['super'] < 19)
							{
								print "m=$item[super]&"; 
								print "a=$item[id]&";
							}
							else
							{
								$mainsuper = mysql_query("Select super from subjects where id = $item[super]");
								$mainsuper = mysql_fetch_array($mainsuper);
								
								print "m=$mainsuper[super]&"; 
								print "a=$item[super]&";
							}
								print "s=$item[id]";
							?>'></font></b><font color='#9B2E2B' size =2><b><?php print $item['title']; ?></b></font></a>
					</td></tr>
					<tr><td style='border-bottom: 1px dotted #C0C0C0; padding-bottom: 2px; padding-left: 20px;'>
							<font size='2'><?php print $item['abriv']; ?> &nbsp;</font>
					</td></tr>
			<?php
				}//end of while
			?>
			</table>
			<p align =center>
			<?php
				$con =str_replace(" ", "_", $con);
				if($pageNumber == 0)
				{		
			
					print "<font class=title1 >&#171; Previous </font>";
				}
				else
				{
					$pn = $pageNumber - 1;
					print "<a href = 'search.php?m=100&pageNumber=$pn&con=$con' class=title><font face=Verdana size=2>&#171;</font> Previous</a>";
				} 		
			
				print "<span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span>";
			
				if($pageNumber == $pageCount )
				{
					print "<font class=title1 >Next &raquo;</font>";
				}
				else
				{
					$pn = $pageNumber + 1;
					print "<a href = 'search.php?m=100&pageNumber=$pn&con=$con' class=title>Next  <font face=Verdana size=2>&raquo;</font></a>";
				}
				print"</p>";
			}
			else
			{
				print "<b><font size='2' color='#FF0000'>There is nthing to search please type some text in the search box</font></b>";
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
    </table></td>
  </tr>
</table>
</body>
</html>