<?php
	session_start();

	include("config.php");

	if(isset($_SESSION['u']) and isset($_SESSION['p']) and isset($_REQUEST['subject'])  and isset($_SESSION['super']) )
	{
		$user = $_SESSION['u'];
		$pass = $_SESSION['p'];
		$subject = $_REQUEST['subject'];
		$sup = $_SESSION['super'];
		$sub = $mainLinks[$sup];
		$check = mysql_query("Select id from users where id ='$user' and pass = '$pass' and `$sub` ='t'");
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
	if(isset($_REQUEST['id']))
	{
		$query = "Select title, abriv, context from subjects where id=$_REQUEST[id]";
		$curentSubject = mysql_query($query) or die(mysql_error());
		$curentSubject = mysql_fetch_array($curentSubject);
	}
	else
		die("");
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
		<?php
		if(isset($_REQUEST['isbranch']))
		{
			$subject = mysql_query("select super from subjects where id =$_REQUEST[id]")or die(mysql_error());
			$subject = mysql_fetch_array($subject);
			$subject = $subject['super'];
			print "<a href  ='editbranch.php?subject=$subject&type=List'>";
		}
		else
			print "<a href ='main.php?subject=$_SESSION[super]'>";
		?>
		<font face="Albany" size="2">Back</font></a></td>
	<td style="border-bottom:1px solid #808080; border-top:2px solid #000000; " width="492">
		<b>
		<font face="Albany" size="3" color="#000080">
		<?php
		if(isset($_REQUEST['isbranch']))
		{

			$title = mysql_query("select title from subjects where id = $subject")or die(mysql_error());
			$title = mysql_fetch_array($title);
			$title= $title['title'];
			print $title;
		}
		else
			print $mainLinks["$subject"];
		?>
		</font></b></td>
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
					<table cellpadding = 5 cellspacing = 0 border = 0 width = 100%>
					<form action = <?php print isset($_GET['isbranch'])?"editbranch.php?type=List&branch=$subject":"main.php";?>  method =post>
					<input type = hidden name = subject value =<?php print $_SESSION['super']; ?>>
					<input type = hidden name = id value =<?php print $_REQUEST['id']; ?>>
					<tr>
						<td height="32"><b>Title : </b> </td>
						<td height="32">
						<input type = text name = title size="41" value = '<?php print $curentSubject['title']; ?>'></td>
					</tr>
					<tr>
						<td height="109" valign = top><b>Abbreviation:</b></td>
						<td height="109" valign =top>
						<textarea name = abriv style="width: 100%; height:192"><?php print str_replace("acbhzxt/","../acbhzxt/",$curentSubject['abriv']); ?></textarea></td>
					</tr>
					<tr>
						<td valign = top><b>Context : </b> </td>
						<td><textarea name = context id="elm1" style="width: 100%; height:400"><?php print str_replace("acbhzxt/","../acbhzxt/",$curentSubject['context']); ?></textarea></td>
					</tr>
					<tr>
						<td colspan = 2 align =center>
							<input type =submit name = Change value = Change>
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
		</td>
	</tr>
	</table>
	<br><br><br>
	</td>
</tr>
</table>
</body>

</html>