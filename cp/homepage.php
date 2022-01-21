<?php
	session_start();

	include("config.php");

	if(isset($_SESSION['u']) and isset($_SESSION['p']) )
	{
		$check = mysql_query("Select id from users where id ='$_SESSION[u]' and pass = '$_SESSION[p]' and `Home Page` ='t'");
		if(!($check = mysql_fetch_array($check)))
		{
			session_destroy();
				die("<center><font color = red size =5><b>If you think that you have privlage to see this page please <a href = index.php>Ligin</a> then go back</b></font></center>");
		}
	}
	else
	{
		session_destroy();
			die("<center><font color = red size =5><b>If you think that you have privlage to see this page please <a href = index.php>Ligin</a> then go back</b></font></center>");
	}
	/////////////////////////////
	if(isset($_REQUEST['savewelcome']))
	{
		$con = str_replace("../acbhzxt/","acbhzxt/",$_POST['context']);
		mysql_query("update subjects set  context ='$con', lmb='$_SESSION[n]' where id=0") or die(mysql_error());
	}
	else if(isset($_REQUEST['saveannoun']))
	{
		$abr = str_replace("../acbhzxt/","acbhzxt/",$_POST['abriv']);
		mysql_query("update subjects set  abriv ='$abr', lmb='$_SESSION[n]' where id=0") or die(mysql_error());
	}
	/////////////////////////////
	$query = "Select  abriv, context from subjects where id=0";
	$curentSubject = mysql_query($query) or die(mysql_error());
	$curentSubject = mysql_fetch_array($curentSubject);
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Add Subject</title>
<!-- TinyMCE -->
<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,media,searchreplace,print,contextmenu,paste,directionality,fullscreen",
		theme_advanced_buttons1_add_before : "newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "emotions,iespell,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		content_css : "example_word.css",
	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",
	    plugi2n_insertdate_timeFormat : "%H:%M:%S",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		media_external_list_url : "example_media_list.js",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		paste_auto_cleanup_on_paste : true,
		paste_convert_headers_to_strong : false,
		paste_strip_class_attributes : "all",
		paste_remove_spans : false,
		paste_remove_styles : false
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}
</script>
<!-- /TinyMCE -->

</head>

<body>
<table cellpadding = 0 cellspacing = 0 border =0 width = 700 align = center bgcolor=#FAFAFA height="495">
<tr>
	<td width="181" style="border-bottom:1px solid #808080; border-left:2px solid #000000; border-top:2px solid #000000; ">
		<a href = control.php><font face="Albany" size="2">Back</font></a></td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<b><font face="Albany" color="#000080">Home Page </font></b></td>
	<td width="23" style="border-bottom:1px solid #808080; border-right:2px solid #000000; border-top:2px solid #000000; ">
			<input type = button onclick ="window.close();" style = 'height:22; padding:0px; font-weight:bold; font-size:15px; width:23' value ='X'>
	</td>
</tr>
<tr>
	<td colspan = 4 style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000">&nbsp;&nbsp;&nbsp;&nbsp; <a href =PicManager.php target =pic >Pic Manager</a> 
	| <a href="FileManager.php" target =file>File Manager</a><br>
	<table border = 0 cellpadding = 10 cellspacing = 0 width = 100% height="424">
	<tr>
		<td><!---Body of the work--->
<table align = center width = 98% cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' >
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Edit 
							Welcome massage</font></td>
							<td background = 'images/top-right.gif' width =28> </td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000;">
					<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0  >
					<tr>
						<td align=center valign = top style="border-left:2px solid #000080; border-right:2px solid #000080; border-bottom:2px solid #000080; padding:3px; ">
					<table cellpadding = 5 cellspacing = 0 border = 0 width = 100%>
					<form action = homepage.php  method =post>					
						<tr><td valign = top width="11%"><b>Welcome&nbsp; : </b> </td>
					<tr>	<td width="86%">
						<textarea name = context style="width: 100%; height:200"><?php print str_replace("acbhzxt/","../acbhzxt/",$curentSubject['context']); ?></textarea></td>
					</tr>
					<tr>
						<td colspan = 2 align =center>
							<input type =submit name = savewelcome value = Save>
							&nbsp;&nbsp;
							<input type = reset value = Restore>
						</td>
					</tr>
					</form>
					</table>
					</td>
					</tr>
					</table>
					</td>
				</tr>
				</table>
				<br>
<table align = center width = 98% cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' >
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Edit 
							Welcome massage</font></td>
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
					<table cellpadding = 5 cellspacing = 0 border = 0 width = 100%>
					<form action = homepage.php  method =post>					
						<tr><td valign = top width="11%"><strong>Announcement</strong><b>&nbsp; : 
							</b> </td>
					<tr>	<td width="86%"><textarea name = abriv id="elm1" style="width: 100%; height:200"><?php print str_replace("acbhzxt/","../acbhzxt/",$curentSubject['abriv']); ?></textarea></td>
					</tr>
					<tr>
						<td colspan = 2 align =center>
							<input type =submit name = saveannoun value = Save>
							&nbsp;&nbsp;
							<input type = reset value = Restore>
						</td>
					</tr>
					</form>
					</table>
					</td>
					</tr>
					</table>
					</td>
				</tr>
				</table>
				<br>
<table align = center width = 98% cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;Pictures</font></td>
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
						<table border = 0 cellpadding = 7 cellspacing =0 width =98%>
						<form action = homepage.php method =post  enctype="multipart/form-data">
						<tr><td colspan = 4 style="border: 1px solid #000000"><input type = submit name = delete value = Del>&nbsp;&nbsp;<font size="5">|
							</font>&nbsp;
							<input type = submit name = addpic value = Add>
							<input type ='file' name = 'uploaded' size="25">&nbsp;&nbsp;
						<?php
						
						
	$massage = 0;
	if(isset($_REQUEST['addpic']))
	{
		$allowed_file_type = array('image/gif','image/pjpeg','image/jpeg','image/png','image/jpg');	
		$target = "../grfx/";
		
		if(isset($_FILES['uploaded']) and (basename( $_FILES['uploaded']['name']) != ""))
		{	
			$target = $target . basename( $_FILES['uploaded']['name']) ;
			$uploaded_type = $_FILES['uploaded']['type'];
						
			if(empty($uploaded_type))
				$massage = 2;
			
			if ((!in_array($_FILES['uploaded']['type'],$allowed_file_type)))
				$massage = 3;
			
			if (file_exists("../grfx/" . $_FILES["uploaded"]["name"]))
				$massage = 4;
			if($massage == 0)
				if(!move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
					$massage = 6;
				
			if($massage == 0)
			{
				$insertion="insert into bannerimg (name,addedby) values('".$_FILES["uploaded"]["name"]."','$_SESSION[u]')";
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
		$names = mysql_query("Select name from bannerimg where id in($in)") or die(mysql_error());
		while($name = mysql_fetch_array($names))
			unlink("../grfx/$name[name]");	

		mysql_query("delete from bannerimg where id in($in)") or die(mysql_error());
	}
	

	if($_SESSION['u']=='admin')
		$condition = "";
	else
		$condition = "where addedby='$_SESSION[u]'";
	
	$pageNumber = isset($_REQUEST['pageNumber']) ? $_REQUEST['pageNumber'] : 0;
	$showNum =20;
	$startFrom = ($pageNumber * $showNum);

	$q="SELECT * from bannerimg $condition ORDER By id desc Limit $startFrom, $showNum;";
	$rs=mysql_query($q) or die(mysql_error());

	$nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action
		
	$pageCount = mysql_query("select count(*) as pc from bannerimg $condition");
	$pageCount = mysql_fetch_array($pageCount);
		$pageCount = (floor($pageCount['pc']/$showNum)==($pageCount['pc']/$showNum)?(floor($pageCount['pc']/$showNum)-1):(floor($pageCount['pc']/$showNum)));

						
						
						switch($massage)
						{
							case 1:
								print "<font color =red>Pleasee, select a picutre.</font>";
								break;
							case 2:
								print "<font color =red>This is not a picture!</font>";
								break;
							case 3:
								print "<font color =red>You can upload only image files!</font>";
								break;
							case 4:
								print "<font color =red>This Picture is already exists!</font>";
								break;
							case 5:
								print "<font color =red>Problem while uploading your Picture!</font>";
								break;
							case 6:
								print "<font color =red>Problem while uploading your Picture!</font>";
								break;
							case 7:
								print "<font color =green>Your Picture is uploaded!</font>";
								break;
							default:
								print " <b>Prefered Dimensions<font color=olive> width:heigth = 300:150</font><b>";

						}
						
 							print "</td></tr>";

							$i=0;
							while($img= mysql_fetch_array($rs))
							{
								if($i % 4 == 0)
									print "<tr>";
								
								print "<td width=25% align = center><img border = 1 src ='../grfx/$img[name]' width = 150 height = 150><br>";
								print "<input type = checkbox name = 'id[]' value = '$img[id]'> ";
								print " $img[name]";
								if($_SESSION['u']=='admin')
									print "<br><font size = 2 color =#888866>Added By:$img[addedby]</font>";
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
								print "<a href ='homepage.php?pageNumber=$pn'>&#171; Previous</a>";
							} 		
						
								print "<span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </span>";
						
							if($pageNumber == $pageCount )
							{
								print "Next &raquo;";
							}
							else
							{
								$pn = $pageNumber + 1;
								print "<a href='homepage.php?pageNumber=$pn'>Next &raquo;</a>";
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
				</table>
		</td>
	</tr>
	</table>
	<br><br><br>
	</td>
</tr>
</table>
</body>

</html>