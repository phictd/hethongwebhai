<?php
session_start();
require_once('libraries/hanghoa.php');
//if($_GET['co']==1){
//echo "<div align='center'><font size='+2' color=#FF0033'>Bạn Cần Đăng Nhập</font></div>";	
//}
if(isset($_SESSION['cart']) && $_SESSION['tongmathang'] >0 ){
echo "<form method='post' action='index.php?module=giohang&act=capnhat'>";
echo "<table width='600' align='center' border=1 cellpadding='0' cellspacing='0'  bordercolorlight='#FFFF00' class='xemgiohang'>";
echo "<tr>";
echo "<td colspan='6' align='center'><font color='#0033CC' size='+2'>Danh Sách Hàng Hóa</font></td>";
echo "</tr>";
echo "<tr>";
 echo "<td width='45' align='center'><strong>STT</strong></td>";
  echo "<td width='130' align='center'><strong>Tên Hàng</strong></td>";
 echo "<td width='75' align='center'><strong>Giá</strong></td>";
  echo "<td width='65' align='center'><strong>Số Lượng</strong></td>";
  echo "<td width='100' align='center'><strong>Thành Tiền</strong></td>";
  echo "<td width='50' align='center'><strong>Xóa</strong></td>";
 echo "</tr>";
	

		//$strid=implode(",",$listid);
		$hang = new HangHoa;
			foreach($_SESSION['cart'] as $key=>$value){
				$hang->set_idhang($key);
			
		
		$dataid[] = $hang->getHang();
			}

	$j=1;
    foreach($dataid as $data){
		foreach($data as $row){
			echo "<tr>";
			echo " <td width='45' align='center'>$j</td>";
			echo "<td width='130' align='center'>".$row['TenHang']."</td>";
			echo "<td width='75' align='center'>".number_format($row['Gia'])."</td>";
			echo "<td width='65' align='center'><input type='text' size='5' name=qty[$row[idHang]] value={$_SESSION['cart'][$row['idHang']]} /></td>";
			echo "<td width='100' align='right'>".number_format($_SESSION['cart'][$row['idHang']]*$row['Gia'])."</td>";
			echo "<td width='50' align='center'><a href='index.php?module=giohang&act=xoa&idHang=$row[idHang]'>xóa</a></td>";
			echo "</tr>";

    		$total+=$_SESSION['cart'][$row['idHang']]*$row['Gia'];
			$j++;
		}
	}

$_SESSION['thanhtien'] = number_format($total);
echo "<tr bgcolor='#999999' height='30'>
    <td colspan='3' align='center'><font size='+1'>Tổng giá trị </font></td>
<td colspan='3'align='center'><font size='+1'>".$total." VND</font></td>
  </tr>";
echo "</table>";
echo "<br/>";

echo "<center>";
    echo "<input name='capnhat' type='submit' value='Cập Nhật Lại Số Lượng' style='margin:5px 20px 0px 5px'/>";
	 echo "<a href='index.php?module=giohang&act=xoa&idHang=0'><input name='d' type='button' value='Xóa Giỏ Hàng' style='margin:5px 20px 0px 0px' /></a>";
   	echo "<a href='index.php?module=giohang&act=dathang'><input name='dh' type='button' value='Đặt Hàng'/></a>";

echo "</center>";
echo "</form>";
}else{
    echo "<h3 align='center'>Chưa Có Mặt Hàng Nào Được Chọn</h3>";
}
?>