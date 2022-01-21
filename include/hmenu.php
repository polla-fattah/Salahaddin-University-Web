<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" valign="bottom">
    <td height="20" colspan="3">
		<table  border="0" cellspacing="0" cellpadding="0" width="500">
		<tr>
	    <?php
			for($i=0 ; $i < 5 ; $i++)
				if($i==$main)
						print "<td align='center' valign='bottom' class='menuActive' width='100' height='20'><a href='index.php?m=$i&s=$i' class='menutopa'>".$mainLinks[$i]."</a></td>";
				else
						print "<td align='center' valign='bottom' class='menuNormal' width='100' height='20'><a href='index.php?m=$i&s=$i' class='menutop'>".$mainLinks[$i]."</a></td>";
		      		
	    ?>
		</tr>
		</table>	    
    </td>
  </tr>
  <tr>
    <td height="5" colspan="3" bgcolor="#9B2E2B" ></td>
  </tr>
  <tr>
    <td width="400" height="15"></td>
    <td width="30" height="15" align="right" valign="top"><img src="img/corner/agel.jpg" width="30" height="15"></td>
    <td width="170" height="15" bgcolor="#9B2E2B"></td>
  </tr>
</table>
