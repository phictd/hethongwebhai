// JavaScript Document

function obj(){
	td=navigator.appName;
	if(td == "Microsoft Internet Explorer"){
		dd= new ActiveXObject("Microsoft.XMLHTTP");	
	}else{
		dd= new XMLHttpRequest();	
	}
	return dd;
}

http=obj();

function showlv(id){
	http.open('get','http://localhost/phpnc27/training/modules/user/getlevel.php?id='+id,true);
	http.onreadystatechange=process;
	http.send(null);
}

function process(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('ketqua').innerHTML=kq;
	}
}