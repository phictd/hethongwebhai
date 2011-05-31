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
function suaphieunhap(id,ghichu){	
	http.open('get','modules/nhapkho/sua.php?id='+id+'&ghichu='+ghichu,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}

function suadonhang(id,ngaygiao,nguoinhan,dienthoai,diadiemgiao,ghichu){
	
	http.open('get','modules/donhang/sua.php?id='+id+'&ngaygiao='+ngaygiao+'&nguoinhan='+nguoinhan+'&dienthoai='+dienthoai+'&diadiemgiao='+diadiemgiao+'&ghichu='+ghichu,true);
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
function xoauser(id){	
	http.open('get','modules/user/xoa.php?id='+id,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}
function xoaphieunhap(id){	
	http.open('get','modules/nhapkho/xoa.php?id='+id,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}
function xoadonhang(id){
	http.open('get','modules/donhang/xoa.php?id='+id,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);
}




function xemhinh(idHang){
	http.open('get','modules/hanghoa/xemhinh.php?id='+idHang,true);
	http.onreadystatechange=process_list;
	http.send(null);
}

function list(module){
	http.open('get','modules/'+module+'/list.php',true);
	http.onreadystatechange=process_list;
	http.send(null);
}




function themdong(module,stt){	
	http.open('get','modules/'+module+'/them.php?stt='+stt,true);
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

function themuservaocsdl(ten,lv){	
	http.open('get','modules/user/themvaocsdl.php?ten='+ten+'&lv='+lv,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);		
}

function themhanghoavaocsdl(idcongty,tenhang,gia){	

	http.open('get','modules/hanghoa/themvaocsdl.php?idcongty='+idcongty+'&tenhang='+tenhang+'&gia='+gia,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);		
}


function themphieunhapvaocsdl(id,ghichu){	
	http.open('get','modules/nhapkho/themphieunhapvaocsdl.php?idphieu='+id+'&ghichu='+ghichu,true);
	http.onreadystatechange=process_tuongtaccsdl;
	http.send(null);		
}
function themdonhangvaocsdl(id,user,ngaydat,ngaygiao,nguoinhan,dienthoai,diadiem,ghichu){	
	http.open('get','modules/donhang/themdonhangvaocsdl.php?id='+id+'&user='+user+'&ngaydat='+ngaydat+'&ngaygiao='+ngaygiao+'&nguoinhan='+nguoinhan+'&dienthoai='+dienthoai+'&diadiem='+diadiem+'&ghichu='+ghichu,true);
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

/////////////////////TAO HIEU UNG CHO GIO HANG//////////////////////
function getdata(x){
	http.open("get","modules/giohang/themhang.php?data="+x,true);
	http.onreadystatechange=process_bay;
	http.send(null);
}

function process_bay(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		if(kq != 0){
				
				document.getElementById("cart_details").innerHTML=kq;
		}
	}
}
////////////////////////////////////////////////////////



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
				case '11': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('user');break;
				case '12   ': document.getElementById('thongbao').innerHTML='Xóa Thành Công';list('user');break;
				case '13': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('nhapkho');break;
				case '14   ': document.getElementById('thongbao').innerHTML='Xóa Thành Công';list('nhapkho');break;
				case '15': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('nhapkho');break;
				case '16': document.getElementById('thongbao').innerHTML='Sửa Thành Công';list('donhang');break;
				case '17   ': document.getElementById('thongbao').innerHTML='Xóa Thành Công';list('donhang');break;
				case '18': document.getElementById('thongbao').innerHTML='Thêm Thành Công';list('donhang');break;
				default : document.getElementById('thongbao').innerHTML=kq;
			}
			
		}
	}
}






