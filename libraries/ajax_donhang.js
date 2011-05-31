// JavaScript Document
function isInt(x) { 
   var y=parseInt(x); 
   if (isNaN(y)) return false; 
   return x==y && x.toString()==y.toString(); 
 } 
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


function suachitiet_donhang(iddonhang,idhang,soluong){
	if(soluong==0||isInt(soluong)==false){
		alert('Số lượng nhập không đúng');
		window.location.href="chitiet.php?id="+iddonhang;		
	}else{
		http.open('get','suachitiet.php?iddonhang='+iddonhang+'&idhang='+idhang+'&soluong='+soluong,true);
		http.onreadystatechange=process_suachitiet_donhang;
		http.send(null);	
	}
}
function process_suachitiet_donhang(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		window.location.href="chitiet.php?id="+kq;		
	}
}

function xoachitiet_donhang(iddonhang,idhang){	
	http.open('get','xoachitiet.php?iddonhang='+iddonhang+'&idhang='+idhang,true);
	http.onreadystatechange=process_xoachitiet_donhang;
	http.send(null);		
}
function process_xoachitiet_donhang(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		window.location.href="chitiet.php?id="+kq;		
	}
}