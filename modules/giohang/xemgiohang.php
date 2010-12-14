<?php
session_start();
if($_GET['co']==1){
echo "<div align='center'><font size='+2' color=#FF0033'>Bạn Cần Đăng Nhập</font></div>";	
}
if($_SESSION['tongsl'] > 0){
echo "<form method='post' action='index.php?module=giohang&act=capnhat'>";
echo "<table width='600' align='center' border=1 cellpadding='0' cellspacing='0'  bordercolorlight='#FFFF00' class='xemgiohang'>";
echo "<tr>";
echo "   <td colspan='6' align='center'><font color='#0033CC' size='+2'>Danh Sách Hàng Hóa</font></td>";
echo "   </tr>";
echo "   <tr>";
 echo "    <td width='45' align='center'><strong>STT</strong></td>";
  echo "   <td width='150' align='center'><strong>Tên Hàng</strong></td>";
 echo "    <td width='75' align='center'><strong>Giá</strong></td>";
  echo "   <td width='75' align='center'><strong>Số Lượng</strong></td>";
  echo "   <td width='100' align='center'><strong>Thành Tiền</strong></td>";
  echo "   <td width='50' align='center'><strong>Xóa</strong></td>";
 echo "  </tr>";

    for($j = 1; $j <= $_SESSION['tongsl']; $j++){
    echo "<tr>";
    echo " <td width='45'>$j</td>";
    echo "<td width='175'>".$_SESSION['tenhang'.$j]."</td>";
    echo "<td width='50'>".$_SESSION['gia'.$j]."</td>";
    echo "<td width='75'><input type='text' size='5' onKeyUp='CheckNumber(this)' name='C$j' value='".$_SESSION['soluong'.$j]."'/></td>";
    echo "<td width='100'>".$_SESSION['gia'.$j]*$_SESSION['soluong'.$j]."</td>";
    echo "<td width='50'><a href='index.php?module=giohang&act=xoa&id=$j'>xóa</a></td>";
    echo "</tr>";

    $tong=$tong+$_SESSION['gia'.$j]*$_SESSION['soluong'.$j] ;
}

$_SESSION['thanhtien'] = $tong;
echo "<tr bgcolor='#999999' height='30'>
    <td colspan='3' align='center'><font size='+1'>Tổng giá trị </font></td>
<td colspan='3'align='center'><font size='+1'>$tong VND</font></td>
  </tr>";
echo "</table>";
echo "<br/>";

echo "<center>";
    echo "<input name='Button1' type='submit' value='Cập Nhật' style='margin:5px 20px 0px 5px'/>";
   	echo "<a href='index.php?module=giohang&act=dathang'><input name='Button2' type='button' value='Đặt Hàng'/></a>";

echo "</center>";
echo "</form>";
}else{
    echo "<h3 align='center'>Chưa Có Mặt Hàng Nào Được Chọn</h3>";
}
?>