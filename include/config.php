<?php
$mainLinks=array("Home Page","President Office","Colleges","Academic Relations","Research Affairs","About Us", "About Erbil City", "Students", "Interested Links", "News & Events", "Development Centers", "Legal Office","University Calendar", "Library","Media", "Import Office", "Contact Us", "FAQs", "Site Map");

if(isset($_REQUEST['m']))
	$main=$_REQUEST['m'];
else
	$main=0;

if(isset($_REQUEST['s']))
	$subject=$_REQUEST['s'];
else
	$subject=0;
function main_is_list($mm)
{
	$li= array(8);
	$loop = count($li);
	for($i = 0 ; $i < $loop ; $i++)
		if( $mm == $li[$i] )
			return true;
	return false;
}
mysql_connect("localhost", "root", "tano");
mysql_select_db("salahaddin");

function rotatorx($x){ 

	if($handlex=opendir($x)){ //start of if 1
	$r=array();
	
	while(false!==($filex=readdir($handlex))){ //start of loop
		if(($filex!='.') && ($filex!='..')){ //start of if 2
		$r[]=$filex;} //end of if 2
	} //end of loop
	
	closedir($handlex);
	} //end of if 1
	
	$r_keys=array_rand($r,2);
	
	return $r[$r_keys[0]];

} //end of function rotatorx
?>

