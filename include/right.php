<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><img src="img/logo.jpg" width="125" height="110"></td>
  </tr>
  <tr>
    <td height="490" align="center" valign="top">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="40"></td>
        </tr>
        <tr>
          <td align="center" valign="top"><form action="search.php" method="post" name="searchFrm" id="searchFrm">
          <input type =hidden name =m value =100>
              <table width="100%"  border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <td align="center"><input name="con" type="text" class="txtBox" id="keyword" size="30" value="Search Box" onBlur="txtBoxFull('Search Box')" onFocus="txtBoxEmpty('Search Box')"></td>
                  <td><input name="Submit" type="submit" class="buttonBox" value="GO"></td>
                </tr>
              </table>
          </form></td>
        </tr>
        <tr>
          <td align="center" valign="top">
          <table width="100%"  border="0" cellspacing="0" cellpadding="0" >
			<?php
				for ($i = 5; $i < 19;$i++)
				{
	          		if($i==$main)
	          		{
						print "<tr height='12' ><td width='4'></td>
								<td align='left' valign='middle' class='menuvA'><a href='index.php?m=$i&s=$i' class='menuvactive'>&raquo; ".$mainLinks[$i]."</a></td>
							<td width='7' bgcolor='#ffffff'><img src='img/arrw/left.gif'></td></tr>
							<tr height='5'><td></td><td></td><td></td></tr>";
					}
					else
					{
					
						print "<tr height='12' ><td width='4'></td>
							<td align='left' valign='middle' class='menuvN' onMouseOver=this.className='menuvH' onMouseOut=this.className='menuvN'><a href='index.php?m=$i&s=$i' class='menuv'>&raquo; ".$mainLinks[$i]."</a></td>
						<td width='7'></td></tr>
						<tr height='5'><td></td><td></td><td></td></tr>";
						
					}	  
				}
          ?>
          </table>
          </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
