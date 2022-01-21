<table width='100%'  border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='372' align='left' valign='top'><table width='100%'  border='0' cellpadding='0' cellspacing='0'>
              <tr>
                <td align='left' valign='top'>
                  <div id='box' style='position:static; width:90% '> 
                    <p align='justify'><?php print $context; ?></span></p>
                  </div></td>
              </tr>
              <tr>
                <td align='center' valign='middle'><hr width='300' size='1' noshade color='#333333'>
                  <table width='300' height='120' border='0' cellpadding='0' cellspacing='0'>
                  <tr align='center' valign='bottom'>
                    <td height='27' colspan='3' style='background-image:url(img/box/margin-t.jpg); background-repeat:no-repeat;paddin-top:22px '><p><strong>
					
<a href="http://salahaddin-ac.com/index.php?m=8&s=8">News & Events</a></strong></p></td>
                  </tr>
                  <tr>
                    <td width='10' align='right' valign='middle' style='background-image:url(img/box/margin-l.jpg); background-repeat:repeat-y '></td>
                    <td width='280' align='left' valign='top'><div id='publicbox' class='publicbox'>
                        <?php print $Announce['abriv']; ?>
                    </div></td>
                    <td width='10' align='left' valign='middle' style='background-image:url(img/box/margin-r.jpg); background-repeat:repeat-y '></td>
                  </tr>
                  <tr align='center' valign='top'>
                    <td height='20' colspan='3' style='background-image:url(img/box/margin-b.jpg); background-repeat:no-repeat '></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width='249' align='center' valign='top'><table width='230' height='280' border='0' cellpadding='0' cellspacing='0'>
              <tr>
                <td width='15' height='83' align='center' valign='middle'><img src='img/arrw-b/up.gif' width='7' height='7' onmousedown='divUp('latestnews')' onmouseup='clearTimeout(tu)'></td>
                <td width='210' rowspan='3' align='left' valign='top'><div id='latestnews' class='mybox'>
				<table cellpadding =0 cellspacing =0 border =0 width =100%>
				<?php
				$latest = mysql_query('Select id, title from subjects where super=8 order by id desc limit 10')or die (mysql_error());
				while($news=mysql_fetch_array($latest))
				{
					print "	<tr><td style='padding-top: 10px'><font face=Verdana size=2><font color='#9B2E2B'>&raquo;</font> </font><a href ='index.php?m=8&s=$news[id]' ><font size='2' color='#9B2E2B'>$news[title]</font></a></td></tr>";
				}
				?>
				</table>
                </div></td>
              </tr>
              <tr>
                <td width='15' align='center' valign='middle'><img src='img/news.gif' width='15' height='113'></td>
              </tr>
              <tr>
                <td width='15' height='84' align='center' valign='middle'><img src='img/arrw-b/down.gif' width='7' height='7' onmousedown='divDown('latestnews')' onmouseup='clearTimeout(td)'></td>
              </tr>
            </table></td>
          </tr>
        </table>