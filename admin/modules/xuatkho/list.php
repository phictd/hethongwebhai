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
</style><div align="center">	
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
 //ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/donhang.php');
require_once('../../../libraries/function.php');
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
			echo "<td align=center width='100px'><textarea id='username$stt' readonly='readonly' cols='5' rows='1' disabled >$item_donhang[Username]</textarea></td>";
			echo "<td align=center width='70px'><input type='text' class='tim' id='ngaydat$stt' value='$item_donhang[ThoiDiemDatHang]' size='7' disabled='disabled'/>
									<input type='text' class='cam' id='ngaygiao$stt' value='$item_donhang[ThoiDiemGiaoHang]' size='7' /></td>";
			echo "<td align=center width='70px'><font style='font-weight:900; color:#FF0'>".xulygia($item_donhang['TongTien'])."</font></td>";
			echo "<td align=center width='80px'><textarea id='nguoinhan$stt'  cols='7' rows='1' >$item_donhang[TenNguoiNhan]</textarea></td>";
			echo "<td align=center width='100px'><input type='text' id='dienthoai$stt' value='$item_donhang[DienThoai]' size='9' /></td>";
			echo "<td align=center width='100px'><textarea id='diadiemgiao$stt' cols='9' rows='1' >$item_donhang[DiaDiemGiaoHang]</textarea></td>";
			
			echo "<td align=center width='100px'><input type='text' id='ghichu$stt' value='$item_donhang[GhiChu]' size='10'/></td>";
			
			?>	
            	<td align=center width='50px'> <a href='modules/xuatkho/chitiet.php?id=<?php echo $item_donhang[idDonHang];?>' target="_blank" >Chi Tiết</a></td>		
				<td align=center width='50px'> <a href='#' onclick="suadonhang('<?php echo $item_donhang[idDonHang];?>',
                															document.getElementById('ngaygiao<?php echo $stt;?>').value,
                                                                            document.getElementById('nguoinhan<?php echo $stt;?>').value,
                                                                            document.getElementById('dienthoai<?php echo $stt;?>').value,
                                                                            document.getElementById('diadiemgiao<?php echo $stt;?>').value,
                                                                            document.getElementById('ghichu<?php echo $stt;?>').value
                                                                                )">Xuất</a></td>
			<?php
			
			echo "</tr>";
		}
	}
	
?><br />

  </table>
    <div id='them'></div><br />
    <div id="thongbao"></div>
    <a href="#" onclick="themdong('donhang',<?php echo ++$stt;?>)" >Thêm </a>
    </div>
    
</div> 

