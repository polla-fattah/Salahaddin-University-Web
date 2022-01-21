<ol>
<?php
	for($i = 0 ; $i < 19 ; $i++)
	{
		print "<li><a href ='index.php?m=$i&s=$i' class='title'>$mainLinks[$i]</a>";
		if($mainLinks[$i]=="Colleges")
		{
			//rimains after colleges finished
		}
		else if($mainLinks[$i] != "News & Events")
		{
			$additional = mysql_query("Select id, title from subjects where super = $i order by seq") or die(mysql_error());
			print "<ul type=square>";
			while($add = mysql_fetch_array($additional))
				print "<li><a href ='index.php?m=$i&a=$add[id]&s=$add[id]' class=title><font color='#555555;'>$add[title]</font></a></li>";
			print "</ul>";
		}
		print "</li>";
	}
?>
</ol>