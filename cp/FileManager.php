<?php
	session_start();
	
	include("config.php");
	if(isset($_SESSION['u']) and isset($_SESSION['p']) )
	{
		$user = $_SESSION['u'];
		$pass = $_SESSION['p'];
	}
	else
	{
		session_destroy();
			die("<center><font color = red size =5><b>If you think that you have privlage to see this page please <a href = index.php>Ligin</a> then go back</b></font></center>");
	}
	$massage = 0;
	if(isset($_REQUEST['addfile']))
	{
		$allowed_file_type = array('.pdf','.rtf','.txt','.doc','.docx','.ppt', '.pptx','.mdb','.accdb','.xls','.xlsx','.zip','.rar');
		
		$file_type    = array('.pdf'=>'pdf.jpg','.rtf'=>'rtf.png','.txt'=>'txt.gif','.doc'=>'doc.jpg','.docx'=>'doc.jpg', '.ppt'=>'ppt.gif', '.pptx'=>'ppt.gif','.mdb'=>'mdb.png','.accdb'=>'mdb.png','.xls'=>'xls.jpg','.xlsx'=>'xls.jpg','.zip'=>'zip.jpg','.rar'=>'zip.jpg');	
		$ok = true;
		$target = "../files/";

		if(isset($_FILES['uploaded']) and (basename( $_FILES['uploaded']['name']) != ""))
		{	
			$target = $target . basename( $_FILES['uploaded']['name']) ;
			$uploaded_type = $_FILES['uploaded']['type'];

			$ext = strrchr($_FILES['uploaded']['name'], '.');

			if(empty($uploaded_type))
			{
				$ok = false;
				$massage = 2;
			}
			
			if ((!in_array($ext,$allowed_file_type)))
			{
				$ok = false;
				$massage = 3;
			}
			
			if (file_exists("../files/" . $_FILES["uploaded"]["name"]))
			{
				$ok = false;
				$massage = 4;
			}
			if($ok)
				if(!move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
				{
					$ok = false;
					$massage = 6;
				}
				else
					chmod("../files/".$_FILES["uploaded"]["name"] ,0644);
			if($ok)
			{
				$insertion="insert into files (name,addedby,img) values('".$_FILES["uploaded"]["name"]."','$_SESSION[u]','".$file_type[$ext]."')";
		      	mysql_query($insertion) or $massage = 5;
		      	$massage = 7;
			}
		}
		else
		{
			$massage = 1;
		}
	
	}

	if(isset($_REQUEST['delete']) and isset($_REQUEST['id']))
	{
		@ $id = $_REQUEST['id'];
		$in = "-100";
		foreach($id as $value)
			$in = "$in, $value";
		$names = mysql_query("Select name from files where id in($in)") or die(mysql_error());
		while($name = mysql_fetch_array($names))
			unlink("../files/$name[name]");	

		mysql_query("delete from files where id in($in)") or die(mysql_error());
	}
	

	if($_SESSION['u']=='admin')
		$condition = "";
	else
		$condition = "where addedby='$_SESSION[u]'";
	
	$pageNumber = isset($_REQUEST['pageNumber']) ? $_REQUEST['pageNumber'] : 0;
	$showNum =40;
	$startFrom = ($pageNumber * $showNum);

	$q="SELECT * from files $condition ORDER By id desc Limit $startFrom, $showNum;";
	$rs=mysql_query($q) or die(mysql_error());

	$nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action
		
	$pageCount = mysql_query("select count(*) as pc from files $condition");
	$pageCount = mysql_fetch_array($pageCount);
		$pageCount = (floor($pageCount['pc']/$showNum)==($pageCount['pc']/$showNum)?(floor($pageCount['pc']/$showNum)-1):(floor($pageCount['pc']/$showNum)));

?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>File Manager</title>
</head>
<body background='images/axibkgnd.gif' topmargin=5>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA >
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">&nbsp;
		</td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<b><font face="Albany" color="#000080">File Manager</font></b></td>
	<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
			<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
	</td>
</tr>
<tr>
	<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">
	<table border = 0 cellpadding = 0 cellspacing = 0 width = 100% height =400>
	<tr>
		<td><br><!---Body of the work--->

<table align = center width = 96% cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Files</font></td>
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
						</p>
						<table border = 0 cellpadding = 3 cellspacing =0 width =98%>
						<form action = FileManager.php method =post  enctype="multipart/form-data">
						<tr><td colspan = 4 style="border: 1px solid #000000"><input type = submit name = delete value = Del>&nbsp;&nbsp;<font size="5">|
							</font>&nbsp;
							<input type = submit name = addfile value = Add>
							<input type ='file' name = 'uploaded' size="25">&nbsp;
						<?php
						switch($massage)
						{
							case 1:
								print "<font color =red>Pleasee, select a file.</font>";
								break;
							case 2:
								print "<font color =red>This is not a file!</font>";
								break;
							case 3:
								print "<font color =red>This file type is not suported!</font>";
								break;
							case 4:
								print "<font color =red>This file is already exists!</font>";
								break;
							case 5:
								print "<font color =red>Problem while uploading your file!</font>";
								break;
							case 6:
								print "<font color =red>Problem while uploading your file!</font>";
								break;
							case 7:
								print "<font color =green>Your file is uploaded succesfuly!</font>";
								break;
						}
						?>
						
 						</td></tr>
						<?php
							$i=0;
							while($file= mysql_fetch_array($rs))
							{
								if($i % 4 == 0)
									print "<tr>";
								
								print "<td width=25% align = center><a href ='../files/$file[name]'><img border = 0 src ='images/$file[img]' width = 70 height = 80></a><br>";
								print "<input type = checkbox name = 'id[]' value = '$file[id]'> ";
								print "<input type = text value='files/$file[name]' style='width:100px'>";
								if($_SESSION['u']=='admin')
									print "<br><font size = 2 color =#888866>Added By:$file[addedby]</font>";
								$i++;
							}
							print "<tr><td colspan = 4 align=center>";
							
							if($pageNumber == 0)
							{
								print "&#171; Previous";
							}
							else
							{
								$pn = $pageNumber - 1;
								print "<a href ='filemanager.php?pageNumber=$pn'>&#171; Previous</a>";
							} 		
						
							print "<span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span>";
						
							if($pageNumber == $pageCount )
							{
								print "Next &raquo;";
							}
							else
							{
								$pn = $pageNumber + 1;
								print "<a href='filemanager.php?pageNumber=$pn'>Next &raquo;</a>";
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
				</table><br><br>		
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>