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

function sualoaihang(id,ten){
	http.open('get','modules/loaihang/sua.php?id='+id+'&ten='+ten,true);
	http.onreadystatechange=process_sua;
	http.send(null);
}
function xoaloaihang(id){
	http.open('get','modules/loaihang/xoa.php?id='+id,true);
	http.onreadystatechange=process_xoa;
	http.send(null);
}

function process_xoa(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('ketqua').innerHTML=kq;
	}
}

function process_sua(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('ketqua').innerHTML=kq;
	}
}

function listloaihang(){
	http.open('get','modules/loaihang/list.php',true);
	http.onreadystatechange=process_list;
	http.send(null);
}

function process_list(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('ketqua').innerHTML=kq;
	}
}

function themloaihang(stt){
	http.open('get','modules/loaihang/them.php?stt='+stt,true);
	http.onreadystatechange=process_them;
	http.send(null);
}

function process_them(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('them').innerHTML=kq;
	}
}