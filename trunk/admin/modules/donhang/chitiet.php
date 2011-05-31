<?php 
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
require_once('../../../libraries/chitietdonhang.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/function.php');

//ini_set( "display_errors", 0);


if(isset($_POST['dong'])){	
	dongcuaso();
	exit();
}
$id=$_GET['id'];

if(isset($_POST['ok'])){
	$idhang=$_POST['hanghoa'];
	if($idhang=='-1')
		echo "<script type='text/javascript'>
     		alert('Bạn chưa chọn hàng');
		</script> ";
	else{
		if($_POST['soluong']!="")
			$soluong=$_POST['soluong'];
		else
			$soluong=0;		
		$chitiet=new ChiTietDonHang;
		$chitiet->set_idHang($idhang);
		$chitiet->set_idDonHang($id);
		$chitiet->set_soluong($soluong);
		$chitiet->ThemChiTietDonHang();
	}
	echo "<script type='text/javascript'>
     		location.href='chitiet.php?id=$id';
		</script> ";
}

$a=new DonHang;
$a->set_idDonHang($id);
if(isset($_POST['dong'])){		
	dongcuaso();
	exit();
}
if(isset($_POST['xoa'])){		
	$a->XoaDonHang();
	dongcuaso();
	exit();
}
$data=$a->getdata();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chi Tiết Hóa Đơn</title>
<script type="text/javascript" src="../../../libraries/ajax_donhang.js"></script>
<link href="../../templates/default/style_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="chitiet.php?id=<?php echo $id;?>" method="post" name="frm" enctype="multipart/form-data" >

<table width="600px">
	<tr>
    	<td class="title"> Mã Hóa Đơn</td>
        <td class="info"><h3><?php echo $id;?></h3></td>
    </tr>
    <tr>
    	<td class="title">Ngày Đặt</td>
        <td class="info" ><input type="text" name="txthoten" size="30" value="<?php echo $data[0]['ThoiDiemDatHang'];?>" disabled="disabled" class="center" /></td>        
    </tr>
     <tr>
    	<td class="title">Ngày Giao</td>
        <td class="info" ><input type="text" name="txthoten" size="30" value="<?php echo $data[0]['ThoiDiemGiaoHang'];?>" disabled="disabled" class="center" /></td>        
    </tr>
    <tr>
    	<td class="title">Điện Thoại</td>
        <td class="info"><input type="text" name="txthoten" size="30" value="<?php echo $data[0]['DienThoai'];?>" disabled="disabled" class="center"/></td>
    </tr>
     <tr>
    	<td class="title">Địa điểm</td>
        <td class="info"><input type="text" name="txthoten" size="30" value="<?php echo $data[0]['DiaDiemGiaoHang'];?>" disabled="disabled" class="center"/></td>
    </tr>
    <tr>
    	<td class="title">Ghi Chú</td>
        <td class="info"><input type="text" name="txtdiachi" size="30" value="<?php echo $data[0]['GhiChu'];?>" disabled="disabled" class="center"/></td>
    </tr>    
</table>
<fieldset>
            	<legend>Chi Tiết Đơn Hàng</legend>
        				<table width="600px">
                        <tr>
                            <td class="title1" width="50px"> STT</td>
                            <td class="title1" width="150px"> Loại Sản Phẩm</td>
                            <td class="title1"width="150px"> Công Ty Sản Phẩm</td>
                            <td class="title1"width="150px"> Tên Sản Phẩm</td>
                            <td class="title1"width="100px"> Số Lượng</td>                            
                        </tr>
                        <?php
						$chitiet=new ChiTietDonHang;
						$chitiet->set_idDonHang($id);
						$data_chitiet=$chitiet->listChiTietDonhang();						
						if($data_chitiet==0)
							echo "<tr>
                            		<td class='info1' colspan='5'> Không có chi tiết nào trong phiếu này</td>
								</tr>";
						else{
							$stt=0;
							$hanghoa=new HangHoa;
							foreach($data_chitiet as $item_chitiet){
								$stt++;
								echo"<tr>
										<td class='info1' width='50px'>$stt</td>";								
								$hanghoa->set_idhang($item_chitiet['idHang']);
								$data_hanghoa=$hanghoa->listhanghoa();		
								echo"<td class='info1' width='150px'><input type='text' id='loai$stt' size='15' value='".$data_hanghoa[0][TenLoai]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='congty$stt' size='15' value='".$data_hanghoa[0][TenCongTy]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='tensanpham$stt' size='15' value='".$data_hanghoa[0][TenHang]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='100px'><input type='text' name='soluong$stt' size='15' value='$item_chitiet[SoLuong]' disabled='disabled' class='right'/></td>
									 ";
								echo "</tr>";								
							}							
						}?>
						
                    </table>
                    
                    <div id="them"></div>
                    <center><a href="#" onClick="themdongchitiet('<?php echo ++$stt;?>')" ><input type="button" id="themct" value="Thêm Sản Phẩm" /> </a><input type='submit' name='xoa' value='Xóa Đơn Hàng'/><input type='submit' name='dong' value='Đóng'/></center>
                
            </fieldset>  
</form>

</body>
</html>
