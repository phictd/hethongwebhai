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
/*
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
}*/
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
/////
$a=new DonHang;
$a->set_idDonHang($id);

$data=$a->getdata();

?>
<?php
$ngaydat = date('d');
$thangdat = date('m');
$namdat = date('Y');

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
<form action="phieuxuatkho_xuat.php?id=<?php echo $id;?>" method="post" name="frm" enctype="multipart/form-data" >
<div id="xk_top">
	<div id="xk_left">
    Bộ phận: <input type="hidden" name="txtbophan" size="10" value="Quản lý kho" /><?php echo $bophan;?></div><!-- div xk_left close -->
    <div id="xk_middle" class="center">
      <br />
<p><font style="font-size:20px;font-weight:900;">PHIẾU XUẤT KHO</font></p>
      <p>Ngày <?php echo $ngaydat;?> tháng <?php echo $thangdat;?> năm <?php echo $namdat;?></p>
    </div><!-- div xk_middle close -->
    <div id="xk_right" >
    	
          <p>Số: <input type="hidden" name="txtso" size="10" class="right" value="<?php echo $so;?>" /><?php echo $so;?></p>
          <p>Nợ: <input type="hidden" name="txtno" size="10" class="right" value="<?php echo $no;?>" /><?php if($no=="")echo "...................."; else echo $no;?></p>
          <p>Có: <input type="hidden" name="txtco" size="10" class="right" value="<?php echo $co;?>" /><?php if($co=="")echo "....................";else echo $co;?></p>
      	
    </div><!-- div xk_right close -->    
</div><!-- div xk_top close -->
   	<div id="xk_info">
   	  <p>&nbsp;</p>
   	  <p><label>Họ tên người nhận hàng</label> <input type="hidden" name="txthoten" size="50" value="<?php echo $hoten;?>"/><span>: <?php echo $hoten;?></span></p>
      <p><label>Địa chỉ</label><input type="hidden" name="txtdiachi" size="50" value="<?php echo $diachi;?>"/><span>: <?php echo $diachi;?></span></p>
      <p><label>Số điện thoại</label><input type="hidden" name="txtsodienthoai" size="50" value="<?php echo $sodienthoai;?>"/><span>: <?php echo $sodienthoai;?></span></p>
   	  <p><label>Lý do xuất kho</label><input type="hidden" name="txtlydoxuatkho" size="50" value="<?php echo $lydoxuatkho;?>" /><span>: <?php echo $lydoxuatkho;?></span></p>
   	  <p><label>Xuất tại kho</label><input type="hidden" name="txtxuattaikho" size="50" value="<?php echo $xuattaikho;?>"/><span>: <?php echo $xuattaikho;?></span></p>
      
   	  <p>&nbsp;</p>   
              
      <table width="640px">
        <tr>
          <td class="title1" width="10px">STT</td>
          <td class="title1" width="70px">Loại Hàng</td>
          <td class="title1"width="70px">Công Ty </td>
          <td class="title1"width="150px">Tên Hàng</td>
          <td class="title1"width="40px">Đơn vị tính</td>
          <td class="title1"width="40px">Số Lượng</td> 
          <td class="title1"width="130px">Đơn Giá</td> 
          <td class="title1"width="130px">Thành Tiền</td>
                                      
        </tr>
        <?php
						$chitiet=new ChiTietDonHang;
						$chitiet->set_idDonHang($id);
						$data_chitiet=$chitiet->listChiTietDonhang();						
						if($data_chitiet==0)
							echo "<tr>
                            		<td class='info1' colspan='8'> Không có chi tiết nào trong phiếu này</td>
								</tr>";
						else{
							$stt=0;
							$hanghoa=new HangHoa;
							foreach($data_chitiet as $item_chitiet){
								$stt++;
								echo"<tr>
										<td class='info1' width='10px'>$stt</td>";								
								$hanghoa->set_idhang($item_chitiet['idHang']);
								$data_hanghoa=$hanghoa->listhanghoa();		
								echo"<td class='info1' width='70px'>".$data_hanghoa[0][TenLoai]."</td>
										<td class='info1' width='70px'>".$data_hanghoa[0][TenCongTy]."</td>
										<td class='info1' width='150px'>".$data_hanghoa[0][TenHang]."</td>
										<td class='info1' width='40px'>Cái</td>									
										<td class='info1' width='40px'>$item_chitiet[SoLuong]</td>
									
										<td align='center' width='130px'>                                								
										".xulygia($data_hanghoa[0][Gia])."      
										</td> 
										<td align='center' width='130px'>".xulygia($data_hanghoa[0][Gia]*$item_chitiet[SoLuong])."
										</td>
									</tr>";
        						
							}							
						}?>
        <tr>
       	  <td class='info1'width="10px"></td>
          <td class='info1' colspan="3" width="290px" align="center">Cộng</td>         
          <td class='info1'width="40px" align="center">X</td>
          <td class='info1'width="40px" align="center">X</td>
          <td class='info1'width="130px" align="center">X</td>
          <td class='info1'width="130px" align="center"><?php echo xulygia($data[0]['TongTien']);?></td>
        </tr>
      </table>     
<div id="xk_bottom">
    <p><strong>Tổng số tiền</strong> (viết bằng chữ): <?php echo doc_so($data[0]['TongTien']);?></p>
    <p><div class="right" style="margin-right:100px;">
    <br/>
    		Xuất. ngày <?php echo $ngaydat;?> tháng <?php echo $thangdat;?> năm <?php echo $namdat;?>
       </div>
    </p>
    <p>
    <div class="chuky">Thủ kho<br />
    					(Ký,họ tên)</div>   
    <div class="chuky">Người nhận hàng<br />
    					(Ký,họ tên)</div>
    <div class="chuky">Người lập phiếu<br />
    					(Ký,họ tên)</div>                                                         
    </p>     
    </div><!-- div xk_bottom close --> 
</div><!-- div xk_info close -->

<div align="center" style="clear:left;">
<br/>
	<input type="submit" name='ok' value="Xuất Kho" /><input type="submit" name='in' value="In Phiếu" /><input type='submit' name='dong' value='Đóng'/>  
</div>
 </form>

</body>
</html>
