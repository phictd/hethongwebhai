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

function themdongchitiet(stt,idphieunhap){		
	http.open('get','themchitiet.php?stt='+stt+'&idphieunhap='+idphieunhap,true);
	http.onreadystatechange=process_them;
	http.send(null);
}

function process_them(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('them').innerHTML=kq;
	}
}

function thaydoiloaihang(idloai){	
	http.open('get','showcongty.php?idloai='+idloai,true);
	http.onreadystatechange=process_thaydoiloaihang;
	http.send(null);		
}


function process_thaydoiloaihang(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('icongty').innerHTML=kq;
	}
}

function thaydoicongty(idcongty){
	http.open('get','showhanghoa.php?idcongty='+idcongty,true);
	http.onreadystatechange=process_thaydoicongty;
	http.send(null);	
}
function process_thaydoicongty(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('ihanghoa').innerHTML=kq;
	}
}