<?php 
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
require_once('../../../libraries/chitietphieunhap.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/function.php');
?>

<?php 
ini_set( "display_errors", 0);


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
		$chitiet=new ChiTietPhieuNhap;
		$chitiet->set_idhang($idhang);
		$chitiet->set_idphieunhap($id);
		$chitiet->set_soluong($soluong);
		$chitiet->insert_chitietphieunhap();
	}
	echo "<script type='text/javascript'>
     		location.href='chitiet.php?id=$id';
		</script> ";
}

$a=new PhieuNhap;
$a->set_idphieunhap($id);

if(isset($_POST['xoa'])){	
	$a->delete_phieunhap();
	dongcuaso();
	exit();
}
$data=$a->getdata();

$ngaynhap=$data['NgayNhap'];

$nam=substr($ngaynhap,0,4);
$thang=substr($ngaynhap,5,2);
$ngay=substr($ngaynhap,8,2);
$ngaynhap=$ngay.'-'.$thang.'-'.$nam;

$tongtien=$data['TongTien'];
$ghichu=$data['GhiChu'];

$chitiet=new ChiTietPhieuNhap;
$chitiet->set_idphieunhap($id);
$data_chitiet=$chitiet->listchitietphieunhap();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chi Tiết Phiếu Nhập</title>
<script type="text/javascript" src="../../../libraries/ajax_nhaphang.js"></script>
<link href="../../templates/default/style_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="chitiet.php?id=<?php echo $id;?>" method="post" name="frm" enctype="multipart/form-data" >

<table width="600px">
	<tr>
    	<td class="title"> Mã Phiếu Nhập</td>
        <td class="info"><h3><?php if($data==0) echo "Phiếu này đã bị xóa";else echo $id;?></h3></td>
    </tr>
    <tr>
    	<td class="title">Ngày Nhập</td>
        <td class="info" ><input type="text" name="txthoten" size="30" value="<?php echo $ngaynhap;?>" disabled="disabled" class="center" /></td>        
    </tr>
    <tr>
    	<td class="title">Tổng Tiền</td>
        <td class="info"><font style="font-weight:700;color:#F00;font-size:18px"><?php echo xulygia($tongtien);?></font></td>
    </tr>
    <tr>
    	<td class="title">Ghi Chú</td>
        <td class="info"><input type="text" name="txtdiachi" size="30" value="<?php echo $ghichu;?>" disabled="disabled" class="center"/></td>
    </tr>    
</table>
<fieldset>
            	<legend>Chi Tiết Phiếu Nhập</legend>
        				<table width="600px">
                        <tr>
                            <td class="title1" width="50px"> STT</td>
                            <td class="title1" width="150px"> Loại Sản Phẩm</td>
                            <td class="title1"width="150px"> Công Ty Sản Phẩm</td>
                            <td class="title1"width="150px"> Tên Sản Phẩm</td>
                            <td class="title1"width="100px"> Số Lượng</td>                            
                        </tr>
                        <?php
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
								echo"<td class='info1' width='150px'><input type='text' id='loai$stt' size='14' value='".$data_hanghoa[0][TenLoai]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='congty$stt' size='14' value='".$data_hanghoa[0][TenCongTy]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='tensanpham$stt' size='14' value='".$data_hanghoa[0][TenHang]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='100px'><input type='text' name='soluong$stt' size='7' value='$item_chitiet[SoLuong]' disabled='disabled' class='right'/></td>
									 ";
								echo "</tr>";								
							}							
						}?> 
                        </table>
                        <div id="them"></div>
								<center><a href="#" onClick="themdongchitiet('<?php echo ++$stt;?>','<?php echo $id;?>')" ><input type="button" id="themct" value="Thêm Sản Phẩm" /> </a><input type='submit' name='xoa' value='Xóa Phiếu Nhập'/><input type='submit' name='dong' value='Đóng'/></center>               
                
            </fieldset>  
</form>

</body>
</html>
