<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieuxuat.php');
require_once('../../../libraries/donhang.php');
require_once('../../../libraries/chitietphieuxuat.php');
require_once('../../../libraries/chitietdonhang.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/function.php');
if(isset($_POST['dong'])){	
	dongcuaso();
	exit();
}
$ngaydat = date('d');
$thangdat = date('m');
$namdat = date('Y');
$dat = "$namdat-$thangdat-$ngaydat";
/////// lay tong tien tu donhang ra
$iddh=$_GET['id'];
$a=new DonHang;
$a->set_idDonHang($iddh);
$data=$a->getdatatheogiatri("TongTien");
$a->update_tinhtrang();//cap nhat tinh trang la da xuat cho don hang
//lay danh sach hanghoa trong chitietdonhang
$chitietdh=new ChiTietDonHang;
$chitietdh->set_idDonHang($iddh);
$datachitietdh = $chitietdh->listChiTietDonhang();
// lay cac bien
$bophan=$_POST['txtbophan'];
$so=$_POST['txtso'];
$no=$_POST['txtno'];
$co=$_POST['txtco'];
$hoten=$_POST['txthoten'];
$diachi=$_POST['txtdiachi'];
$sodienthoai=$_POST['txtsodienthoai'];
$lydoxuatkho=$_POST['txtlydoxuatkho'];
$xuattaikho=$_POST['txtxuattaikho'];
$tongtien=$data[0]['TongTien'];
/////chen chitietphieuxuatvao
$chitietpx=new ChiTietPhieuXuat;
foreach($datachitietdh as $datadh){
	$chitietpx->set_idphieuxuat($so);
	$chitietpx->set_idhang($datadh['idHang']);
	$chitietpx->set_soluong($datadh['SoLuong']);	
	$chitietpx->insert_chitietphieuxuat();	
}

// them phieu xuat
if(isset($_POST['ok'])){
	$phieuxuat=new PhieuXuat;
	$phieuxuat->set_idphieuxuat($so);
	$phieuxuat->set_ngayxuat($dat);
	$phieuxuat->set_bophan($bophan);
	$phieuxuat->set_no($no);
	$phieuxuat->set_co($co);
	$phieuxuat->set_nguoinhan($hoten);
	$phieuxuat->set_diachi($diachi);
	$phieuxuat->set_dienthoai($sodienthoai);
	$phieuxuat->set_lydoxuat($lydoxuatkho);
	$phieuxuat->set_xuattaikho($xuattaikho);
	$phieuxuat->set_tongtien($tongtien);
	$phieuxuat->insert_phieuxuat();
	dongcuaso();
	exit();
}



?>