<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
$a= new DonHang;
$id=$_GET['id'];
$ngaygiao=$_GET['ngaygiao'];
$nguoinhan=$_GET['nguoinhan'];
$dienthoai=$_GET['dienthoai'];
$diadiemgiao=$_GET['diadiemgiao'];
$ghichu=$_GET['ghichu'];

$a->set_idDonHang($id);
$a->set_ThoiDiemGiaoHang($ngaygiao);
$a->set_TenNguoiNhan($nguoinhan);
$a->set_DienThoai($dienthoai);
$a->set_DiaDiemGiaoHang($diadiemgiao);
$a->set_GhiChu($ghichu);
$a->update_donhang();
echo "16";

	
?>