<?php 
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/function.php');

$idhang=$_GET['idhang'];

$a=new HangHoa;
$a->set_idhang($idhang);
$data=$a->getdata();
$hinh=$data[UrlHinh];
$tenhang=$data[TenHang];
$mota=$data[MoTa];

$congty=new CongTy;
$congty->set_idcongty($data['idCongTy']);
$data_congty=$congty->getdata();

$loaihang=new LoaiHang;
$loaihang->set_idloai($data_congty['idLoaiHang']);
$data_loaihang=$loaihang->getdata();

$thumuc=locdau($data_loaihang[TenLoai]);
$duongdan="../../../images/".$thumuc."/";

if(isset($_POST['ok'])){
	if($_FILES['img']['name'] != "" || $_POST['txtfull']!=""){
		if($_FILES['img']['name'] != ""){
			move_uploaded_file($_FILES['img']['tmp_name'],$duongdan.$_FILES['img']['name']);
			$image="images/".$thumuc."/".$_FILES['img']['name'];
		}else{
			$image="none";
		}
		if($_POST['txtfull']!="")
			$txtfull=$_POST['txtfull'];
		else
			$txtfull="none";
		if($image!="none")$a->set_urlhinh($image);
		if($txtfull!="none")$a->set_mota($txtfull);
		
		if($a->update_chitiet()){
			echo " Update Thành Công";			
		}else
			echo "Update không thành công";
	}else{
		echo "Không thay đổi dữ liệu.";
	}
	dongcuaso();
	exit();
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xem Hinh</title>
<script type="text/javascript" src="../../../libraries/ckeditor/ckeditor.js"></script>
<style type="text/css">
@charset "utf-8";
*{
margin:0px;
color:black;
}

body{
font:12px verdana;
width:780px;
margin:auto;
}
table{
font:12px verdana;
text-align:center;
}

td{
border:#3C0 solid 1px;
}
.title{
	width:200px;
background:green;
color:#FFFFFF;
font-weight:900;
}
.info{
	width:700px;
}
h3{
	color:#F93;
	font-weight:900;
	font:30px Verdana;
}

</style>
</head>

<body>
<form action="chitiet.php?idhang=<?php echo $idhang;?>" method="post" name="frm" enctype="multipart/form-data">
<table width="900px">
	<tr>
    	<td class="title">Hình hiện tại sản phẩm <h3><?php echo $tenhang;?></h3></td>
        <td class="info"><img src="../../../<?php echo $hinh;?>" width="450px" height="450px" /></td>
    </tr>
    <tr>
    	<td class="title">Cập Nhật Hình mới</td>
        <td class="info"><input type="file" name="img" size="30" /></td>
    </tr>
    <tr>
		<td class="title">Full Information</td>
		<td class="info"><textarea name="txtfull" cols=35 rows=15 ><?php echo $mota;?></textarea></td>
	</tr>
<script type="text/javascript">
	CKEDITOR.replace( 'txtfull' );
</script>    
    <tr>
    	<td class="title"> </td>
        <td class="info"><input type="submit" name="ok" value="Lưu" /><input type="button" name="close" value="Đóng" onclick="window.close()" /></td>
    </tr>
</table>
</form>
</body>
</html>
