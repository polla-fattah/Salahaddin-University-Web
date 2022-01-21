<table width="100%" height="100%"  border="1" cellpadding="1" cellspacing="2" bordercolor="#CCCCCC">
  <tr>
    <td width="40%" align="left" valign="top"><p><strong>Departments list
              <?php 
					if(isset($_GET["cid"])){$cid=$_GET["cid"];}else{$cid=0;}
					?>
-              <a href="main.php?mypage=collegelist" class="blacklnk"> (Back to colleges list)</a> </strong></p>
        <form action="deptadd.php" method="post" name="formdept" id="formdept">
          <table width="100%"  border="0" cellspacing="4" cellpadding="2">
            <tr align="center" valign="middle" bgcolor="#CCCCCC">
              <td colspan="2"><p>Add New Department</p></td>
            </tr>
            <tr>
              <td width="35%"><p>Dept. Name </p></td>
              <td width="65%"><p>
                  <input name="deptname" type="text" class="frmwrite" id="deptname">
              </p></td>
            </tr>
            <tr>
              <td><p>
                  <input name="cid" type="hidden" id="cid" value="<?php echo $cid; ?>">
              </p></td>
              <td><p>
                  <input name="Submit" type="submit" class="frmwrite" value="Submit">
              </p></td>
            </tr>
            <tr bgcolor="#CCCCCC">
              <td height="1" colspan="2"></td>
            </tr>
          </table>
        </form>
        <p>
          <?php
				
			$deptlisttxt="select * from depts where collegeid=$cid";
			$deptrow=mysql_query($deptlisttxt);
			?>
</p>
        <table width="100%"  border="0" cellspacing="3" cellpadding="2">
          <tr align="center" valign="middle" bgcolor="#CCCCCC">
            <td><p><strong>Name</strong> (click on to view dept. links) </p></td>
            <td><p><strong>Edit</strong></p></td>
            <td><p><strong>Del</strong></p></td>
          </tr>
          <?php 
				while($deptrw=mysql_fetch_array($deptrow)){
				$deptid=$deptrw["deptid"];
				$deptname=$deptrw["deptname"];
								
				?>
          <tr>
            <td align="left" valign="middle"><p><a href="main.php?mypage=deptview&cid=<?php echo $cid; ?>&did=<?php echo $deptid; ?>" class="blacklnk"><?php echo $deptname; ?></a></p></td>
            <td align="center" valign="middle"><p><a href="deptedit.php?did=<?php echo $deptid; ?>" target="_blank" class="blacklnk">edit</a></p></td>
            <td align="center" valign="middle"><p><a href="#" class="blacklnk" onClick="deldept(<?php echo $deptid; ?>,'<?php echo $deptname; ?>',<?php echo $cid; ?>)">del</a></p></td>
          </tr>
          <?php
				}
				?>
        </table>
        <p><strong></strong></p></td>
    <td width="60%" align="left" valign="top"><p><strong>List of colleges links -<a href="linkaddc.php?cid=<?php echo $cid; ?>&did=0" target="_blank"> Add new link to this college </a> </strong></p>
        <p><strong>You have photos to upload ? -<a href="uploader.php" target="_blank"> Click this link</a> </strong></p>
        <?php  
			$linktxt="select linkid , linkname , collegeid , deptid from links where collegeid=$cid and deptid=0";
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
