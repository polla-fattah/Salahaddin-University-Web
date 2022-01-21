// JavaScript Document

function dovw(x){
	if(document.getElementById(x).style.display==""){
		document.getElementById(x).style.display="none";
	}
	else
	{
		document.getElementById(x).style.display="";
	}
	
}

function delcollege(x,y){
	t=confirm("Are you sure want to delete the college: "+y+" and the number is: "+x);
	if(t){
		document.location="collegedel.php?cid="+x;
	}
	
	return;
}

function deldept(x,y,z){
	t=confirm("Are you sure want to delete the dept.: "+y+" and the number is: "+x);
	if(t){
		document.location="deptdel.php?did="+x+"&cid="+z;
	}
	
	return;
}


function dellink(x,y,z,b){
	t=confirm("Are you sure want to delete the link: "+y+" and the number is: "+x);
	if(t){
		document.location="linkdel.php?linkid="+x+"&cid="+z+"&did="+b;
		
	}
	
	return;
}

function changefile(z,x,y){
	var f=document.getElementById(z);
	var me=	document.getElementById(x);
	var y=document.getElementById(y);
	if(y.value=="Yes"){
	f.disabled=false;
	me.disabled=false;
	y.value="No";}
	else
	{
	f.disabled=true;
	me.disabled=true;
	y.value="Yes";
	}
}

function changedir(){
	if(document.form1.mydir.value=="Right to Left")
	   {
		document.form1.linkname.dir="rtl";
		document.form1.dir.value="rtl";
		document.form1.align.value="right";
        document.form1.mydir.value="Left to Right";
		}
		else
		{
		document.form1.linkname.dir="ltr";
		document.form1.dir.value="ltr";
		document.form1.align.value="left";
        document.form1.mydir.value="Right to Left";

		}
}

function txtdir(v){
		document.form1.linkname.dir=v;
		
}



function btndir(v){
	if(v=="rtl")
	{document.form1.mydir.value="Left to Right";}
	else
	{document.form1.mydir.value="Right to Left";}
	
	}

