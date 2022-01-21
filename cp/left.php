<?php
	$today = getdate();
?>
<td background =images/left-bg.gif width = 182 align = center valign =top style="margin-top: 20">
		<table width = 100% cellpadding = 0 cellspacing = 0 border = 0 style="margin-top: 20">
		<tr>
			<td align =center style="margin-top: 20">
			<table width = 125 cellpadding = 0 cellspacing = 0 border = 0 align = center>
			<tr>
				<td background ='images/cal-top.gif' height = 50 valign =bottom align = center style="padding-bottom: 3px">
				<b><font face="Arial" color="#FFFFFF"><?php print $today['month'];?></font></b></td>
			</tr>
			<tr>
				<td background = 'images/cal-botm.gif' height =91 align = center >
					<p style="margin:-5px 0px -5px 0px; ">
					<font face="Arial" size="7"><?php print $today['mday'];?></font></p>
					<p style="margin:-5px 0px -5px 0px; "><font face="Arial" size="2"><b><?php print $today['weekday'];?></b></font></p>
					<p style="margin:5px 0px -5px 0px; "><font face="Arial" size="2"><?php print $today['year'];?></font></p>
					
				</td>
			</tr>
			</table>
			</td>
		</tr>
					
		</table>
		</td>