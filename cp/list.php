<?php
	if(isset($_POST['Change']) and isset($_REQUEST['id']))
	{
		$con = str_replace("../acbhzxt/","acbhzxt/",$_POST['context']);
		$abriv = str_replace("../acbhzxt/","acbhzxt/",$_POST['abriv']);

			$query = "update subjects set title ='$_POST[title]', abriv='$abriv', context='$con', lmb='$_SESSION[n]' where id=$_REQUEST[id]";
		mysql_query($query) or die(mysql_error());
	}


	$pageNumber = isset($_REQUEST['pageNumber']) ? $_REQUEST['pageNumber'] : 0;
	$showNum =25;
	$startFrom = ($pageNumber * $showNum);

	$q="SELECT id,title from subjects where super = $subject ORDER By id desc Limit $startFrom, $showNum;";
	$rs=mysql_query($q) or die(mysql_error());

	$nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action
		
	$pageCount = mysql_query("select count(*) as pc from subjects where super =$subject ");
	$pageCount = mysql_fetch_array($pageCount);
		$pageCount = (floor($pageCount['pc']/$showNum)==($pageCount['pc']/$showNum)?(floor($pageCount['pc']/$showNum)-1):(floor($pageCount['pc']/$showNum)));
?>


<table align = center width = 574 cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' width =528 > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Branches</font></td>
							<td background = 'images/top-right.gif' width =28> </td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000;"> 
					<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height="95" >
					<tr>
						<td align=center valign = top style="border-left:2px solid #000080; border-right:2px solid #000080; border-bottom:2px solid #000080; padding:3px; ">
						<p style ="margin:2px" align =left>&nbsp;&nbsp;&nbsp; 
						<font face="arial" size =2>  
						<a href = 'addsubject.php?subject=<?php print $subject; print isset($isbranch)?"&isbranch=true":'';?>'> <b>New</b></a><b> 
						</b></font></p>
						<table border = 1 cellpadding = 1 cellspacing =0 width =98%>
						<form action = <?php print isset($_REQUEST['isbranch'])?"editbranch.php?type=List&branch=$subject":"main.php";?> method =post>
						<input type = hidden name =  subject value = <?php print $subject; ?> >
						<tr>
								<th width=34 ><input type=submit name = delete value = Del style='font-weight: bold; color: #0000FF; border: 0px solid #FFFFFF; padding: 0px; background-color: #FFFFFF'></th>
							<th width="32">Edit</th>
							<th width='409'>Title</th>
						</tr>
						<?php
							$color ="";
							while($item= mysql_fetch_array($rs))
							{
								$color = (($color == "#EEEEEE")?"#CCCCCC" : "#EEEEEE");
								print "<tr bgcolor =$color><td width=20 align = center><input  type =checkbox name = id[] value = $item[id]></td>";
									print "<td align = center><a href = 'edisubject.php?id=$item[id]&subject=$_SESSION[super]";
									print isset($isbranch)?"&isbranch=true":'';
									print "' style='text-decoration:none;'>Edit</a></td>";
								print "<td width=273>$item[title]</td>";
							}

							print "<tr><td colspan = 3 align=center>";
							
							if($pageNumber == 0)
							{
								print "&#171; Previous";
							}
							else
							{
								$pn = $pageNumber - 1;
									$direction = isset($_REQUEST['type'])?"editbranch.php?subject=$subject&pageNumber=$pn&type=$_REQUEST[type]":"main.php?subject=$subject&pageNumber=$pn";
								print "<a href ='$direction'>&#171; Previous</a>";
							} 		
						
								print "<span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span>";
						
							if($pageNumber == $pageCount )
							{
								print "Next &raquo;";
							}
							else
							{
								$pn = $pageNumber + 1;
									$direction = isset($_REQUEST['type'])?"editbranch.php?subject=$subject&pageNumber=$pn&type=$_REQUEST[type]":"main.php?subject=$subject&pageNumber=$pn";
								print "<a href='$direction'>Next &raquo;</a>";
							}
							print "</tr></td>";

						?>
						
						</form>
						</table>
						<br>
						</td>
					</tr>
					</table>
					</td>
				</tr>
				</table><br>