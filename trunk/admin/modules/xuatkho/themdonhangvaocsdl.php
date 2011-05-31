<?php
$id=$_GET['id'];
$user=$_GET['user'];
$ngaydat=$_GET['ngaydat'];
$ngaygiao=$_GET['ngaygiao'];
$nguoinhan=$_GET['nguoinhan'];
$dienthoai=$_GET['dienthoai'];
$diadiem=$_GET['diadiem'];
$ghichu=$_GET['ghichu'];

require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
	$a= new DonHang;
	$a->set_idDonHang($id);
	$a->set_Username($user);
	$a->set_ThoiDiemDatHang($ngaydat);
	$a->set_ThoiDiemGiaoHang($ngaygiao);
	$a->set_TenNguoiNhan($nguoinhan);
	$a->set_DienThoai($dienthoai);
	$a->set_DiaDiemGiaoHang($diadiem);
	$a->set_GhiChu($ghichu);
		
	if($a->ThemDonHang()){
		echo "18";
	}else{
		echo "0";
	}


?>