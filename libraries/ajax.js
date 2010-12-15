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

function suahanghoa(id,congty,ten,gia){	
	http.open('get','modules/hanghoa/sua.php?id='+id+'&congty='+congty+'&ten='+ten+'&gia='+gia,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}

function suauser(u,l){	
	http.open('get','modules/user/sua.php?user='+u+'&level='+l,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}



function xoaloaihang(id){
	http.open('get','modules/loaihang/xoa.php?id='+id,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}

function xoacongty(id){
	http.open('get','modules/congty/xoa.php?id='+id,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}
function xoahanghoa(id){
	http.open('get','modules/hanghoa/xoa.php?id='+id,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}





function xemhinh(idHang){
	http.open('get','modules/hanghoa/xemhinh.php?id='+idHang,true);
	http.onreadystatechange=process_list;
	http.send(null);
}

function list(module){
	switch(module){
		case 'loaihang':	http.open('get','modules/loaihang/list.php',true);break;
		case 'congty':		http.open('get','modules/congty/list.php',true); break;
		case 'hanghoa':		http.open('get','modules/hanghoa/list.php',true); break;
		case 'user':		http.open('get','modules/user/list.php',true); break;
		default : document.getElementById('ketqua').innerHTML='Không có hành động nào';
	}
	http.onreadystatechange=process_list;
	http.send(null);
}




function themdong(module,stt){
	switch(module){
	case 'loaihang':http.open('get','modules/loaihang/them.php?stt='+stt,true);break;
	case 'congty':http.open('get','modules/congty/them.php?stt='+stt,true);break;
	case 'hanghoa':http.open('get','modules/hanghoa/them.php?stt='+stt,true);break;
	case 'user':http.open('get','modules/user/them.php?stt='+stt,true);break;
	default : document.getElementById('ketqua').innerHTML='Không có hành động nào';
	}
	http.onreadystatechange=process_them;
	http.send(null);
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

function themcongtyvaocsdl(ten,lv){	
	http.open('get','modules/user/themvaocsdl.php?ten='+ten+'&lv='+lv,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);		
}

function themhanghoavaocsdl(idcongty,tenhang,gia){	

	http.open('get','modules/hanghoa/themvaocsdl.php?idcongty='+idcongty+'&tenhang='+tenhang+'&gia='+gia,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);		
}



congtyhh=0;
function thaydoiloaihang(idloai,stt){
	congtyhh=stt;
	http.open('get','modules/hanghoa/showcongty.php?idloai='+idloai+'&stt='+stt,true);
	http.onreadystatechange=process_thaydoiloaihang;
	http.send(null);	
}
function process_thaydoiloaihang(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('congtyhh'+congtyhh).innerHTML=kq;
	}
}





function process_list(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('ketqua').innerHTML=kq;
	}
}

function process_them(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('them').innerHTML=kq;
	}
}

function process_tuongtaccsdl(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		if(kq==0){
			document.getElementById('thongbao').innerHTML='Đã có dữ liệu này';			
		}else{
			switch(kq){
				case '1': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('loaihang');break;
				case '2': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('loaihang');break;
				case '3': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('congty');break;
				case '4': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('congty');break;
				case '5   ': document.getElementById('thongbao').innerHTML='Xóa Thành Công';list('loaihang');break;
				case '6   ': document.getElementById('thongbao').innerHTML='Xóa Thành Công';list('congty');break;
				case '7': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('hanghoa');break;
				case '8   ': document.getElementById('thongbao').innerHTML='Xóa Thành Công';list('hanghoa');break;
				case '9': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('hanghoa');break;
				case '10': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('user');break;
				default : document.getElementById('thongbao').innerHTML=kq;
			}
			
		}
	}
}






