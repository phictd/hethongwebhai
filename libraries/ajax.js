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
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}


function suacongty(id,loai,ten){
	http.open('get','modules/congty/sua.php?id='+id+'&loai='+loai+'&ten='+ten,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}


function xoaloaihang(id){
	http.open('get','modules/loaihang/xoa.php?id='+id,true);
	http.onreadystatechange=process_xoa;
	http.send(null);
}

function process_xoa(){
	if(http.readyState == 4 && http.status == 200){
		list('loaihang');
	}
}

function list(module){
	switch(module){
		case 'loaihang':	http.open('get','modules/loaihang/list.php',true);break;
		case 'congty':		http.open('get','modules/congty/list.php',true); break;
		default : document.getElementById('ketqua').innerHTML='Không có hành động nào';
	}
	http.onreadystatechange=process_list;
	http.send(null);
}
function process_list(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('ketqua').innerHTML=kq;
	}
}

function themdong(module,stt){
	switch(module){
	case 'loaihang':http.open('get','modules/loaihang/them.php?stt='+stt,true);break;
	case 'congty':http.open('get','modules/congty/them.php?stt='+stt,true);break;
	default : document.getElementById('ketqua').innerHTML='Không có hành động nào';
	}
	http.onreadystatechange=process_them;
	http.send(null);
}
function process_them(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('them').innerHTML=kq;
	}
}

function themloaihangvaocsdl(tenloai){
	http.open('get','modules/loaihang/themvaocsdl.php?tenloai='+tenloai,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);		
}
function themcongtyvaocsdl(idloai,tencongty){	
	http.open('get','modules/congty/themvaocsdl.php?idloai='+idloai+'&tencongty='+tencongty,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);		
}

function process_tuongtaccsdl(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('thu').innerHTML=kq;
		if(kq==0){
			document.getElementById('thongbao').innerHTML='Đã có dữ liệu này';			
		}else{
			switch(kq){
				case '1': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('loaihang');break;
				case '2': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('loaihang');break;
				case '3': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('congty');break;
				case '4': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('congty');break;
				default : document.getElementById('thongbao').innerHTML='Không có hành động nào';
			}
			
		}
	}
}

