// JavaScript Document

function txtBoxEmpty(x){
	if(document.getElementById('keyword').value==x){
	document.getElementById('keyword').value="";}
}

function txtBoxFull(x){
	if(document.getElementById('keyword').value=="")
	{document.getElementById('keyword').value=x;}
}

function dovw(x){
	if(document.getElementById(x).style.display==""){
		document.getElementById(x).style.display="none";
	}
	else
	{
		document.getElementById(x).style.display="";
	}
	
}


myStep=5 
thestep=myStep 
function divDown(x){ 
document.getElementById(x).scrollTop+=thestep 
td=setTimeout("divDown('"+x+"')",12) 
} 

function divUp(x){ 
document.getElementById(x).scrollTop-=thestep 
tu=setTimeout("divUp('"+x+"')",12) 
} 

