<style type="text/css">
input{
	width:auto;
}
.center{
	text-align:center;
	
}


</style><div align="center">	
	<table align="center"  width="850px" id="tableloaihang" >
    	<tr height="20px">
        	<td class=title width="50px">STT</td>
        	<td class=title width="100px">Mã Đơn</td>
            <td class=title width="100px">Username</td>
            <td class=title width="70px">Ngày Đặt</td>
            <td class=title width="70px">Ngày Giao</td>
            <td class=title width="80px">Người Nhận</td>
            <td class=title width="100px">Điện Thoại</td>
        	<td class=title width="100px">Địa điểm giao</td>
        	<td class=title width="100px">Ghi Chú</td>
            <td class=title width="50px">Chi Tiết</td>
            <td class=title width="30px">Sửa</td>
            <td class=title width="30px">Xóa</td>
                                                            
        </tr>
<?php
 //ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
	$donhang= new DonHang;
	$data_donhang=$donhang->listDonhang();
	$stt=0;
	
	if($data_donhang==0) echo "<tr><td colspan='11'> <div align='center'>Không có Đơn hàng nào</div> </td> </tr>";
	else{
		foreach($data_donhang as $item_donhang){
			$stt++;
			echo "<tr height='20px'>";
			echo "<td align=center width='50px'>$stt</td>";
			echo "<td align=center width='100px'>$item_donhang[idDonHang]</td>";
			echo "<td align=center width='100px'><input type='text' id='username$stt' value='$item_donhang[Username]' size='10' readonly='readonly' class='center'/></td>";
			echo "<td align=center width='70px'><input type='text' id='ngaydat$stt' value='$item_donhang[ThoiDiemDatHang]' size='10' readonly='readonly'/></td>";
			echo "<td align=center width='70px'><input type='text' id='ngaygiao$stt' value='$item_donhang[ThoiDiemGiaoHang]' size='10' readonly='readonly'/></td>";
			echo "<td align=center width='80px'><input type='text' id='nguoinhan$stt' value='$item_donhang[TenNguoiNhan]' size='10' readonly='readonly'/></td>";
			echo "<td align=center width='100px'><input type='text' id='dienthoai$stt' value='$item_donhang[DienThoai]' size='10' disabled='disabled'/></td>";
			echo "<td align=center width='100px'><input type='text' id='diadiemgiao$stt' value='$item_donhang[DiaDiemGiaoHang]' size='15' disabled='disabled'/></td>";
			
			echo "<td align=center width='100px'><input type='text' id='ghichu$stt' value='$item_donhang[GhiChu]' size='10'/></td>";
			
			?>		
            	<td align=center width='30px'> <a href='modules/donhang/chitiet.php?id=<?php echo $item_donhang[idDonHang];?>' target="_blank" >Chi Tiết</a></td>		
				<td align=center width='30px'> <a href='#' onclick="suadonhang('<?php echo $item_donhang[idDonHang];?>',document.getElementById('ghichu<?php echo $stt;?>').value)">Sửa</a></td>
			<?php
			echo "<td align=center  width='30px'><a href='#' onclick=xoadonhang('$item_donhang[idDonHang]')>Xóa</a></td>";
			echo "</tr>";
		}
	}
	
?>
    </table>
    <div id='them'></div><br />
    <div id="thongbao"></div>
    <a href="#" onclick="themdong('donhang',<?php echo ++$stt;?>)" >Thêm </a>
    </div>
    
</div> 