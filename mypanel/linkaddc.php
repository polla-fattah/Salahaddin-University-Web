<?php
session_start();
include("myset.php");
 $cid=$_GET["cid"];
?>

<html>
<head>
<title>MyPanel-version 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Author" content="Seerwan A. Khoshnaw">
<link href="myset.css" rel="stylesheet" type="text/css">
<script language="javascript" src="myscrpt.js"></script>
<script language="javascript" type="text/javascript" src="../cp/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		relative_urls : false,
	    remove_script_host :false,
		plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,media,searchreplace,print,contextmenu,paste,directionality,fullscreen",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
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
</head>
<body bgcolor="#186BAD" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="90%" height="90%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top"><p><?php if(isset($_GET["ok"])){
	if($_GET["ok"]==1)
	{echo "<font color='green'>Data added successfully ... </font>";}
	else
	{echo "<font color='red'>Data did not add successfully ... Try again</font>";}
	
	}
	
	
	if(isset($_GET["cid"]))
	{	$cid=$_GET["cid"];	}
	else	
	{	$cid=0;	}
	$did=$_GET["did"];
	?></p>      <form action="linkaddcdo.php" method="post" enctype="multipart/form-data" name="form1">
                <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                  <tr>
                    <td align="center" valign="middle"><table width="100%"  border="0" cellspacing="5" cellpadding="3">
                      <tr>
                        <td width="11%"><p>Link Name </p></td>
                        <td width="89%"><p>
                            <input name="linkname" type="text" class="frmwrite" id="linkname" size="30">
                        </p></td>
                      </tr>
                      <tr>
                        <td colspan="2"><p>
                          <textarea id="mydata" name="mydata" rows="15" cols="80" style="width: 100%">
		start here
	                      </textarea>
                        </p>                          </td>
                      </tr>
                      <tr>
                        <td><p>
                          <input name="cid" type="hidden" id="cid" value="<?php echo $cid; ?>">
                          <input name="dir" type="hidden" id="dir" value="ltr">
                          <input name="align" type="hidden" id="align" value="left">
                          <input name="did" type="hidden" id="dir3" value="<?php echo $did; ?>">
</p></td>
                        <td><p>
                          <input name="mydir" type="button" class="frmwrite" id="mydir" onClick="changedir()" value="Right to Left">
                        </p></td>
                      </tr>
                      <tr align="center" valign="middle">
                        <td><p>
                            <input name="Submit" type="submit" class="frmwrite" value="Add">
                        </p></td>
                        <td><p>
                            <input name="Submit2" type="reset" class="frmwrite" value="Cancel all">
                        </p></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
    </form></td>
  </tr>
</table>
</body>
</html>