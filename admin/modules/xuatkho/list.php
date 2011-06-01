<style type="text/css">
input{
	width:auto;
}
.center{
	text-align:center;	
}
.tim{
	color:#639;
	font-weight:600;
}
.cam{
	color:#F60;
	font-weight:600;
}
</style>
<div align="center"><br />
 <font style="font-weight:700; font-size:16px"> DANH SÁCH ĐƠN HÀNG CÓ THỂ XUẤT </font>

<table align="center"  width="840px" id="tableloaihang" >
<tr height="20px">
        	<td class=title width="50px">STT</td>
        	<td class=title width="100px">Mã Đơn</td>
            <td class=title width="100px">User</td>
            <td class=title width="70px">Ngày Đặt/Giao</td>
            <td class=title width="70px">Tổng Tiền</td>
            <td class=title width="80px">Người Nhận</td>
            <td class=title width="100px">Điện Thoại</td>
        	<td class=title width="100px">Địa điểm giao</td>
        	<td class=title width="100px">Ghi Chú</td>
            <td class=title width="50px">Chi Tiết</td>
            <td class=title width="50px">Xuất hàng</td>
            
                                                            
        </tr>
<?php
ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
require_once('../../../libraries/phieuxuat.php');
require_once('../../../libraries/function.php');
	$donhang= new DonHang;
	$data_donhang=$donhang->listDonhang();
	$stt=0;
	foreach($data_donhang as $item_donhang){
		if($item_donhang['TinhTrang']!=1){
			$stt++;
			echo "<tr height='20px'>";
			echo "<td align=center width='50px'>$stt</td>";
			echo "<td align=center width='100px'>$item_donhang[idDonHang]</td>";
			echo "<td align=center width='100px'><textarea id='username$stt' readonly='readonly' cols='5' rows='1' disabled >$item_donhang[Username]</textarea></td>";
			echo "<td align=center width='70px'><input type='text' class='tim' id='ngaydat$stt' value='$item_donhang[ThoiDiemDatHang]' size='7' disabled='disabled'/>
										<input type='text' class='cam' id='ngaygiao$stt' value='$item_donhang[ThoiDiemGiaoHang]' size='7' disabled='disabled' /></td>";
			echo "<td align=center width='70px'><font style='font-weight:900; color:#FF0'>".xulygia($item_donhang['TongTien'])."</font></td>";
			echo "<td align=center width='80px'><textarea id='nguoinhan$stt'  cols='7' rows='2' disabled='disabled' >$item_donhang[TenNguoiNhan]</textarea></td>";
			echo "<td align=center width='100px'><input type='text' id='dienthoai$stt' value='$item_donhang[DienThoai]' size='9' disabled='disabled' /></td>";
			echo "<td align=center width='100px'><textarea id='diadiemgiao$stt' cols='9' rows='2' disabled='disabled'>$item_donhang[DiaDiemGiaoHang]</textarea></td>";
			
			echo "<td align=center width='100px'><input type='text' id='ghichu$stt' value='$item_donhang[GhiChu]' size='10' disabled='disabled'/></td>";
			?>	
				<td align=center width='50px'> <a href='modules/donhang/chitiet.php?id=<?php echo $item_donhang[idDonHang];?>' target="_blank" >Chi Tiết</a></td>		
				<td align=center width='50px'> <a href='modules/xuatkho/phieuxuatkho.php?id=<?php echo $item_donhang[idDonHang];?>' target="_blank" >Xuất</a></td>
		<?php
				
			echo "</tr>";
		}
	}
	if($stt==0) echo "<tr><td colspan='11'> <div align='center'>Không có Đơn hàng nào</div> </td> </tr>";
?><br />

</table>
<br /><br />

<font style="font-weight:700; font-size:16px"> DANH SÁCH ĐƠN HÀNG ĐÃ XUẤT </font>

<table align="center"  width="840px" id="tableloaihang" >
<tr height="20px">
        	<td class=title width="50px">STT</td>
        	<td class=title width="100px">Mã Đơn</td>
            <td class=title width="100px">Bộ Phận</td>
            <td class=title width="70px">Ngày Xuất</td>
            <td class=title width="70px">Tổng Tiền</td>
            <td class=title width="80px">Người Nhận</td>
            <td class=title width="100px">Điện Thoại</td>
        	<td class=title width="100px">Địa điểm giao</td>
        	<td class=title width="100px">Ghi Chú</td>
            <td class=title width="50px">Xem Phiếu</td>
            <td class=title width="50px">Xóa</td>
            
                                                            
        </tr>
<?php

	$stt=0;
	$phieuxuat=new PhieuXuat;
	$data_phieuxuat=$phieuxuat->listphieuxuat();
	foreach($data_phieuxuat as $item_phieuxuat){			
		$stt++;
		echo "<tr height='20px'>";
		echo "<td align=center width='50px'>$stt</td>";
		echo "<td align=center width='100px'>$item_phieuxuat[idPhieuXuat]</td>";
		echo "<td align=center width='100px'><textarea id='username$stt' readonly='readonly' cols='5' rows='2' disabled >$item_phieuxuat[BoPhan]</textarea></td>";
		echo "<td align=center width='70px'><input type='text' class='tim' id='ngayxuat$stt' value='$item_phieuxuat[NgayXuat]' size='7' disabled='disabled'/></td>";
		echo "<td align=center width='70px'><font style='font-weight:900; color:#FF0'>".xulygia($item_phieuxuat['TongTien'])."</font></td>";
		echo "<td align=center width='80px'><textarea id='nguoinhan$stt'  cols='7' rows='2' disabled='disabled' >$item_phieuxuat[NguoiNhan]</textarea></td>";
		echo "<td align=center width='100px'><input type='text' id='dienthoai$stt' value='$item_phieuxuat[DienThoai]' size='9' disabled='disabled' /></td>";
		echo "<td align=center width='100px'><textarea id='diadiemgiao$stt' cols='9' rows='2' disabled='disabled'>$item_phieuxuat[DiaChi]</textarea></td>";
				
		echo "<td align=center width='100px'><input type='text' id='ghichu$stt' value='";if($item_donhang['GhiChu']!="")echo $item_donhang['GhiChu'];echo"' size='10' disabled='disabled'/></td>";
				
		?>					
		<td align=center width='50px'> <a href='modules/xuatkho/phieuxuatkho_xuat_xemlai.php?id=<?php echo $item_phieuxuat['idPhieuXuat'];?>' target="_blank" >Xem</a></td>
        <td align=center width='50px'> <a href='#' onclick=xoaphieuxuat('<?php echo $item_phieuxuat['idPhieuXuat'];?>')>Xóa</a></td>	
		<?php
		echo "</tr>";		
	}
	if($stt==0) echo "<tr><td colspan='11'> <div align='center'>Không có Đơn hàng nào</div> </td> </tr>";
	
?><br />

</table>
<div id="thongbao"></div>
    
</div> 

