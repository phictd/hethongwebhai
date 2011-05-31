<?php 
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
require_once('../../../libraries/chitietdonhang.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/function.php');

ini_set( "display_errors", 0);


if(isset($_POST['dong'])){	
	dongcuaso();
	exit();
}
$id=$_GET['id'];

if(isset($_POST['ok'])){
	$soluong=0+$_POST['soluong'];
	$idhang=$_POST['hanghoa'];
	if($idhang=='-1')
		echo "<script type='text/javascript'>
     		alert('Bạn chưa chọn hàng');
		</script> ";
	else{
		if(is_int($soluong)&&$soluong>0){
			
			$chitiet=new ChiTietDonHang;
			$chitiet->set_idHang($idhang);
			$chitiet->set_idDonHang($id);
			$chitiet->set_soluong($soluong);
			$chitiet->ThemChiTietDonHang();
		}else{
			echo "<script type='text/javascript'>
     		alert('Số lượng nhập không đúng ');
		</script> ";
		}
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
<p>
  <center>
    <font style="font-size:16px;font-weight:900;">PHIẾU XUẤT KHO</font></strong>
  </center>
</p>
<center>
  <p>&nbsp;</p>
  
  
  <form action="phieuxuatkho.php?id=<?php echo $id;?>" method="post" name="frm" enctype="multipart/form-data" >
    
    <table width="600px">
      <tr>
        <td class="title"> Mã Phiếu</td>
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
        <td class="title">Tổng tiền</td>
        <td class="info"><font style="font-weight:700;color:#F00;font-size:18px"><?php echo xulygia($data[0]['TongTien']);?></font></td>
      </tr>  
      <tr>
        <td class="title">Ghi chú</td>
        <td class="info"><input type="text" name="txtdiachi" size="30" value="<?php echo $data[0]['GhiChu'];?>" disabled="disabled" class="center"/></td>
      </tr>   
    </table>
    <fieldset>
      <legend>Chi Tiết Đơn Hàng</legend>
      <table width="600px">
        <tr>
          <td class="title1" width="50px"> STT</td>
          <td class="title1" width="80px"> Loại Hàng</td>
          <td class="title1"width="120px"> Công Ty </td>
          <td class="title1"width="150px"> Tên Hàng</td>
          <td class="title1"width="100px"> Số Lượng</td> 
          <td class="title1"width="50px"> Sửa</td> 
          <td class="title1"width="50px"> Xóa</td>                            
        </tr>
        <?php
						$chitiet=new ChiTietDonHang;
						$chitiet->set_idDonHang($id);
						$data_chitiet=$chitiet->listChiTietDonhang();						
						if($data_chitiet==0)
							echo "<tr>
                            		<td class='info1' colspan='7'> Không có chi tiết nào trong phiếu này</td>
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
								echo"<td class='info1' width='150px'><input type='text' id='loai$stt' size='10' value='".$data_hanghoa[0][TenLoai]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='congty$stt' size='14' value='".$data_hanghoa[0][TenCongTy]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='tensanpham$stt' size='15' value='".$data_hanghoa[0][TenHang]."' disabled='disabled' class='center'/>										
										<td class='info1' width='100px'><input type='text' id='soluong$stt' size='6' value='$item_chitiet[SoLuong]'  class='right'/></td>
									 ";?>
        <td align='center' width='50px'>                                								
          <a href='#' onclick=suachitiet_donhang('<?php echo $id;?>','<?php echo $data_hanghoa[0]['idHang'];?>',document.getElementById('soluong<?php echo $stt;?>').value)>Sửa</a>                               
          </td> 
          <td align='center' width='50px'> <a href='#' onclick=xoachitiet_donhang('<?php echo $id;?>','<?php echo $data_hanghoa[0]['idHang'];?>')>Xóa</a> 
          </td>
          </tr>	
        <?php							
							}							
						}?>
        
        </table>
      
      <div id="them"></div>
      
      <center><a href="#" onClick="themdongchitiet('<?php echo ++$stt;?>')" ><input type="button" id="themct" value="Thêm Sản Phẩm" /> </a><input type='submit' name='xoa' value='Xóa Đơn Hàng'/><input type='submit' name='dong' value='Đóng'/></center>
      
      </fieldset>  
  </form>
</center>
</body>
</html>
