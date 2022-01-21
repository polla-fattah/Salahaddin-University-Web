<?php 

$db="salahaddin";
mysql_select_db($db);
$txtcollege="select * from colleges order by collegename";
$mycollege=mysql_query($txtcollege)or die(mysql_error());
$mycollege2=mysql_query($txtcollege)or die(mysql_error());


?>
<table width="501" height="300" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #eeeee;  ">
                      <tr>
                        <td width="250" align="center" valign="top"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
                        <?php 
						while($rowcollege=mysql_fetch_array($mycollege)){ // start colleges loop odd
$collegeid=$rowcollege["collegeid"];
$collegename=$rowcollege["collegename"];
$collegeurl=$rowcollege["collegeurl"];
$collegecolor=$rowcollege["collegecolor"];
$collegebg=$rowcollege["collegebg"];
	if($collegeid &1){ // if start odd print					
						 ?>  
						  <tr>
                            <td width="20" bgcolor="<?php  echo $collegecolor;  ?>" height="10"><?php if($collegebg!="no"){echo "<img width='20' height='20' src='bg/$collegebg' border=1>";} ?></td>
                            <td width="230" height="10"><p><b><?php  echo "<a href='college.php?cid=".$collegeid."' target='blank'>".$collegename."</a>";  ?></b></p></td>
                          </tr>
						 <?php 
							} // end if start odd print
							} // end colleges loop odd
							 ?> 
							
                        </table></td>
                        <td width="1">&nbsp;</td>
                        <td width="250" align="center" valign="top"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
                          <?php 
						while($rowcollege2=mysql_fetch_array($mycollege2)){ // start colleges loop odd
$collegeid2=$rowcollege2["collegeid"];
$collegename2=$rowcollege2["collegename"];
$collegeurl2=$rowcollege2["collegeurl"];
$collegecolor2=$rowcollege2["collegecolor"];
$collegebg2=$rowcollege2["collegebg"];

	if($collegeid2 &1){echo "";} else{ // if start odd print					
						 ?>
                          <tr>
                            <td width="20" bgcolor="<?php  echo $collegecolor2;  ?>" height="10"><?php if($collegebg2!="no"){echo "<img width='20' height='20' src='bg/$collegebg2' border=1>";} ?></td>
                            <td width="230" height="10"><p><b>
                                <?php  echo "<a href='college.php?cid=".$collegeid2."' target='blank'>".$collegename2."</a>";  ?>
                            </b></p></td>
                          </tr>
                          <?php 
							} // end if start odd print
							} // end colleges loop odd
							 ?>
                        </table></td>
                      </tr>
                    </table>