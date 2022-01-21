<?php
if(isset($_REQUEST['seq']))
{
	$ids = mysql_query("Select id from subjects where super=$subject");
	while($id = mysql_fetch_array($ids))
	{
		$sequ = "Update subjects set seq = ".$_REQUEST["$id[id]"]." where id =$id[id]";
		mysql_query($sequ) or die(mysql_error());
	}
}
else if(isset($_REQUEST['addbranch']))
{
	$query = "insert into subjects(super,title,context,lmb) values('$subject','$_REQUEST[title]','$_REQUEST[type]','$_SESSION[n]')";
	mysql_query($query) or die(mysql_error());
}
else if(isset($_POST['Changebranch']))
{
	$con = str_replace("../acbhzxt/","acbhzxt/",$_REQUEST['context']);

	$query = "update subjects set context='$con', lmb='$_SESSION[n]' where id=$_REQUEST[id]";
	mysql_query($query) or die(mysql_error());
}

?>
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href =PicManager.php target =pic >Pic Manager</a>&nbsp; | <a href="FileManager.php" target =file>File Manager</a>
<br>
<br>
		<table align = center width = 500 cellpadding = 0 cellspacing =0 border = 0 bgcolor=#FFFFFF>
				<tr>
					<td>
						<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 height =20>
						<tr>
							<td background = 'images/top-left.gif' width = 16></td>
							<td background = 'images/top-center.gif' > 
							<font size="2" color="#FFFFFF" face="Arial Narrow">&nbsp;The 
							Main Text</font></td>
							<td background = 'images/top-right.gif' width =28> </td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000;"> 
					<table align = center width = 100% cellpadding = 0 cellspacing =0 border = 0 >
					<tr>
						<td style="border-left:2px solid #000080; border-right:2px solid #000080; border-bottom:2px solid #000080; padding:3px; ">
						<table border =0 cellpadding = 0 cellspacing = 0 width =100%>
						<form method="post" action="control.php">
						<input type =hidden name = sid value = <?php print $currentsub['id']?> >
						<input type =hidden name = edit value =true >
						<tr>
							<td>
								<textarea id="elm1" name="context" rows="15" cols="80" style="width: 100%"><?php print str_replace("acbhzxt/","../acbhzxt/",$currentsub['context']);?></textarea>
							</td>
						</tr>
						<tr>
							<td align = center>
								<input type="submit" name="save" value="Save" />
								<input type="reset" name="reset" value="Reset" />
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
						<table border = 1 cellpadding = 1 cellspacing =0 width =98%>
						<form action = 'main.php' method =post>
						<input type = hidden name =  subject value = <?php print $subject; ?> >
						<tr>
								<th width=34 ><input type=submit name = delete value = Del style='font-weight: bold; color: #0000FF; border: 0px solid #FFFFFF; padding: 0px; background-color: #FFFFFF'></th>
							<th width="32">Edit</th>
								<th><input type=submit name = seq value = Seq style='font-weight: bold; color: #0000FF; border: 0px solid #FFFFFF; padding: 0px; background-color: #FFFFFF'></th>
							<th>Type</th>
							<th width='409'>Title</th>
						</tr>
						<?php
								$additions = mysql_query("Select id, seq,title,context from subjects where super = $subject order by seq,id") or die(mysql_error());
							$color = "";
							while($addition= mysql_fetch_array($additions))
							{
								$color = (($color == "#EEEEEE")?"#CCCCCC" : "#EEEEEE");
									print "<tr bgcolor =$color><td width=20 align = center><input  type =checkbox name = id[] value = $addition[id]></td>";
									print "<td align = center><a href = 'editbranch.php?subject=$addition[id]&type=".($addition['context']=="multi007list"?"List":"Text")."' style='text-decoration:none;'>Edit</a></td>";
								print "<td align = center><input type = text datasrc size=4 name = $addition[id] value = $addition[seq]></td>";
								print "<td>".($addition['context']=="multi007list"?"List":"Text")."</td>";
								print "<td width=273>$addition[title]</td>";
							}
						?>
						</form>
						</table>
						<p align = center>
						<form action =main.php method =post>
							<input type = hidden name = subject value = <?php print $subject;?> >
							<font color="#000080" face="Arial" size="2"><b>Add new Branch :</b></font>
							<input type = text name = title size="28">
							<select name = type>
								<option value = 'Under Construction' selected = true>Text</option>
								<option value = 'multi007list'>List</option>
							</select>
							<input type = submit name = addbranch  value =Add>
						
						</form>
						</p>
						</td>
					</tr>
					</table>
					</td>
				</tr>
				</table>
		<p>&nbsp;