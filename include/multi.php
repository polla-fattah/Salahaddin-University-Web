<table width='70%'  border='0' cellpadding='0' cellspacing='0' bordercolor='#A3BCD6'>
<?php
	if(isset($_REQUEST['pageNumber']))
		$pageNumber = $_REQUEST['pageNumber'];
	else
		$pageNumber = 0;
		
	$showNum = 10;
	$startFrom = ($pageNumber * $showNum);

	$q="Select id, title, abriv from subjects where super = $subject ORDER BY id DESC Limit $startFrom, $showNum;";
	$list=mysql_query($q) or die(mysql_error());

	$nr = mysql_num_rows($list); //Number of rows found with LIMIT in action
		
	$pageCount = mysql_query("select count(*) as pc from subjects where super = $subject");
	$pageCount = mysql_fetch_array($pageCount);
	$rc = $pageCount['pc'];
	if(floor($pageCount['pc']/$showNum) == ($pageCount['pc']/$showNum))
		$pageCount = ($pageCount['pc']/$showNum)-1;
	else
		$pageCount = floor($pageCount['pc']/$showNum);

	while ($item = mysql_fetch_array($list))
	{
?>
		<tr><td style='padding-top: 5px;'>
		
				<b><font face='Times New Roman' size='4' color='#9B2E2B'>&raquo; <a href ='index.php?<?php 
					print "m=$main&"; 
					if(isset($_REQUEST['a']))
						print "a=$_REQUEST[a]&";
					print "s=$item[id]"; 
				?>'></font></b><font color='#9B2E2B' size =2><b><?php print $item['title']; ?></b></font></a>
		</td></tr>
		<tr><td style='border-bottom: 1px dotted #C0C0C0; padding-bottom: 2px; padding-left: 20px;'>
				<font size='2'><?php print $item['abriv']; ?></font>
		</td></tr>
<?php
	}//end of while
?>
</table>
<p align =center>
<?php
	if($pageNumber == 0)
	{		

		print "<font class=title1 >&#171; Previous </font>";
	}
	else
	{
		$pn = $pageNumber - 1;
			print "<a href = 'index.php?m=$main&s=$subject&a=$_REQUEST[a]&pageNumber=$pn' class=title><font face=Verdana size=2>&#171;</font> Previous</a>";
	} 		

	print "<span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span>";

	if($pageNumber == $pageCount or $rc == 0)
	{
		print "<font class=title1 >Next &raquo;</font>";
	}
	else
	{
		$pn = $pageNumber + 1;
			print "<a href = 'index.php?m=$main&s=$subject&a=$_REQUEST[a]&pageNumber=$pn' class=title>Next  <font face=Verdana size=2>&raquo;</font></a>";
	}
?>
</p>