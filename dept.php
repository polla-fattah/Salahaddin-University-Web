
<div id="dept" style="position:absolute; overflow:auto; display:none; width:140px; height:200px ; border:1px solid #333333; background-color:#ffffff">
  <table width="100%"  border="1" cellpadding="0" cellspacing="1" bordercolor="#eaeaea" bgcolor="#FFFFFF">
    <tr>
      <td align="right" bgcolor="#eaeaea"><p class="title"><strong><a href="#" onClick="dovw('dept')">CLOSE</a></strong></p></td>
    </tr>
	<?php 
	if(isset($mydeptlnk)){
	while($rwdept=mysql_fetch_array($mydeptlnk)){
	$deptid=$rwdept["deptid"];
	$deptname=$rwdept["deptname"];
	?>
    <tr >
      <td align="center"><p><?php echo "<a href='college.php?cid=".$_GET["cid"]."&did=".$deptid."'>". $deptname ."</a>"; ?></p></td>
    </tr>
    <?php
	}
	}
	?>
  </table>
</div>