<table width="100%" height="100%"  border="1" cellpadding="1" cellspacing="2" bordercolor="#CCCCCC">
  <tr>
    <td width="30%" align="left" valign="top"><p><strong>Departments list
              <?php 
					if(isset($_GET["cid"])){$cid=$_GET["cid"];}else{$cid=0;}
					if(isset($_GET["did"])){$did=$_GET["did"];}else{$did=0;}
					?>
        - <a href="main.php?mypage=collegelist" class="blacklnk">(Back to colleges list)</a></strong></p>
        <p align="center"><strong> <a href="main.php?mypage=collegeview&cid=<?php echo $cid; ?>" class="blacklnk">(Back to this departments college)</a></strong></p>
        <p>&nbsp; </p>
        <p><strong></strong></p></td>
    <td width="70%" align="left" valign="top"><p><strong>List of department links -<a href="linkaddc.php?cid=<?php echo $cid; ?>&did=<?php echo $did; ?>" target="_blank"> Add new link to this department </a> </strong></p>
        <p><strong>You have photos to upload ? -<a href="uploader.php" target="_blank"> Click this link</a> </strong></p>
        <?php  
			$linktxt="select linkid , linkname , collegeid , deptid from links where collegeid=$cid and deptid=$did";
			$linkrow=mysql_query($linktxt);
			?>
        <table width="100%"  border="0" cellspacing="3" cellpadding="2">
          <tr align="center" valign="middle" bgcolor="#eaeaea">
            <td width="80%"><p><strong>Name</strong> </p></td>
            <td><p><strong>Edit</strong></p></td>
            <td><p><strong>Del</strong></p></td>
          </tr>
          <?php 
				while($linkrw=mysql_fetch_array($linkrow)){
				$linkid=$linkrw["linkid"];
				$linkname=$linkrw["linkname"];
				$cid=$linkrw["collegeid"];
				$did=$linkrw["deptid"];

				?>
          <tr>
            <td width="80%" align="left" valign="middle"><p><?php echo $linkname; ?></p></td>
            <td align="center" valign="middle"><p><a href="linkedit.php?linkid=<?php echo $linkid; ?>" target="_blank" class="blacklnk">edit</a></p></td>
            <td align="center" valign="middle"><p><?php if($linkname=='home page'){?>-<?php } else {?><a href="#" class="blacklnk" onClick="dellink(<?php echo $linkid; ?>,'<?php echo $linkname; ?>',<?php echo $cid; ?>,<?php echo $did; ?>)">del</a><?php } ?></p></td>
          </tr>
          <?php
				}
				?>
      </table></td>
  </tr>
</table>
