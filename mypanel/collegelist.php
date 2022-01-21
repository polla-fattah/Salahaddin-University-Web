<table width="100%" height="100%"  border="1" cellpadding="1" cellspacing="2" bordercolor="#CCCCCC">
  <tr>
    <td width="50%" align="left" valign="top"><p><strong>Add New College</strong></p>
        <form action="collegeadd.php" method="post" enctype="multipart/form-data" name="form1">
          <table width="90%"  border="0" cellspacing="5" cellpadding="3">
            <tr>
              <td width="44%"><p>College name </p></td>
              <td width="56%"><p>
                  <input name="collegename" type="text" class="frmwrite" id="collegename" size="30">
              </p></td>
            </tr>
            <tr>
              <td><p>College color </p></td>
              <td><p>
                  <input name="collegecolor" type="text" class="frmwrite" id="collegecolor" size="10">
                  <A id=pick2 
            onclick="cp2.select(document.forms[0].collegecolor,'pick2');return false;" 
            href="#" 
            name=pick2>Pick</A> </p></td>
            </tr>
            <tr>
              <td><p>College background (mix) </p></td>
              <td><p>
                  <input name="collegebg" type="file" class="frmwrite" id="collegebg">
              </p></td>
            </tr>
            <tr>
              <td><p>Have department ? (Yes/No) </p></td>
              <td><p>
                  <select name="collegedept" id="collegedept">
                    <option>yes</option>
                    <option selected>no</option>
                  </select>
              </p></td>
            </tr>
            <tr>
              <td><p>Official website if available</p></td>
              <td><p>
                  <input name="collegerul" type="text" class="frmwrite" id="collegerul" size="30">
              </p></td>
            </tr>
            <tr>
              <td><p>&nbsp;</p></td>
              <td><p>&nbsp;</p></td>
            </tr>
            <tr align="center" valign="middle">
              <td><p>
                  <input name="Submit" type="submit" class="frmwrite" value="Add">
              </p></td>
              <td><p>
                  <input name="Submit2" type="reset" class="frmwrite" value="Cancel all">
              </p></td>
            </tr>
          </table>
          <SCRIPT language=JavaScript>cp.writeDiv()</SCRIPT>
      </form></td>
    <td width="50%" align="left" valign="top"><p><strong>List of All College</strong></p>
        <?php  
			$collegelisttxt="select * from colleges";
			$collegerow=mysql_query($collegelisttxt);
			?>
        <table width="100%"  border="0" cellspacing="3" cellpadding="2">
          <tr align="center" valign="middle" bgcolor="#eaeaea">
            <td><p><strong>Name</strong> (click on to get details) </p></td>
            <td><p><strong>Color</strong></p></td>
            <td><p><strong>Have Dept. </strong></p></td>
            <td><p><strong>Edit</strong></p></td>
            <td><p><strong>Del</strong></p></td>
          </tr>
          <?php 
				while($collegerw=mysql_fetch_array($collegerow)){
				$collegeid=$collegerw["collegeid"];
				$collegename=$collegerw["collegename"];
				$collegecolor=$collegerw["collegecolor"];
				$collegebg=$collegerw["collegebg"];
				$collegedept=$collegerw["collegedept"];
				
				?>
          <tr>
            <td align="left" valign="middle"><p><a href="main.php?mypage=collegeview&cid=<?php echo $collegeid; ?>" class="blacklnk"><?php echo $collegename; ?></a></p></td>
            <td width="20" align="center" valign="middle" bgcolor="<?php echo $collegecolor; ?>"><p>
                <?php if($collegebg!="no"){echo "<img width='20' height='20' src='../bg/$collegebg' border=1>";} ?>
            </p></td>
            <td align="center" valign="middle"><p><?php echo $collegedept; ?></p></td>
            <td align="center" valign="middle"><p><a href="collegeedit.php?cid=<?php echo $collegeid; ?>" target="_blank" class="blacklnk">edit</a></p></td>
            <td align="center" valign="middle"><p><a href="#" class="blacklnk" onClick="delcollege(<?php echo $collegeid; ?>,'<?php echo $collegename; ?>')">del</a></p></td>
          </tr>
          <?php
				}
				?>
      </table></td>
  </tr>
</table>
