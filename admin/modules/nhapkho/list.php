<div align="center">	
	<table align="center"  width="800px" id="tableloaihang" >
    	<tr height="20px">
        	<td class=title width="50px">STT</td>
        	<td class=title width="100px">Mã Phiếu</td>
            <td class=title width="100px">Ngày Nhập</td>
        	<td class=title width="100px">Tổng Tiền</td>
        	<td class=title width="150px">Ghi Chú</td>
            <td class=title width="100px">Chi Tiết</td>
            <td class=title width="100px">Sửa</td>   
            <td class=title width="100px">Xóa</td>                                                 
        </tr>
<?php
 //ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
	$phieunhap= new PhieuNhap;
	$data_phieunhap=$phieunhap->listphieunhap();
	$stt=0;
	
	if($data_phieunhap==0) echo "<tr><td colspan='8'> <div align='center'>Không có phiếu nhập</div> </td> </tr>";
	else{
		foreach($data_phieunhap as $item_phieunhap){
			$stt++;
			$ngaynhap=substr($item_phieunhap[NgayNhap],-2).'-'.substr($item_phieunhap[NgayNhap],5,2).'-'.substr($item_phieunhap[NgayNhap],0,4);
			echo "<tr height='20px'>";
			echo "<td align=center width='50px'>$stt</td>";
			echo "<td align=center width='100px'><input type='text' id='maphieu$stt' value='$item_phieunhap[idPhieuNhap]' size='25' disabled='disabled'/></td>";
			echo "<td align=center width='100px'><input type='text' id='ngaynhap$stt' value='$ngaynhap' size='25' disabled='disabled'/></td>";
			echo "<td align=center width='100px'><input type='text' id='tongtien$stt' value='$item_phieunhap[TongTien]' size='25' disabled='disabled' class='num'/></td>";
			echo "<td align=center width='150px'><input type='text' id='ghichu$stt' value='$item_phieunhap[GhiChu]' size='30'/></td>";
			
			?>
				<td align=center width='100px'><a href='modules/nhapkho/chitiet.php?id=<?php echo $item_phieunhap[idPhieuNhap];?>' target='_blank'>Chi Tiết</a></td>
				<td align=center width='100px'> <a href='#' onclick="suaphieunhap('<?php echo $item_phieunhap[idPhieuNhap];?>',document.getElementById('ghichu<?php echo $stt;?>').value)">Sửa</a></td>
			<?php
			echo "<td align=center  width='100px'><a href='#' onclick=xoaphieunhap('$item_phieunhap[idPhieuNhap]')>Xóa</a></td>";
			echo "</tr>";
		}
	}
	
?>
    </table>
    <div id='them'></div><br />
    <div id="thongbao"></div>
    <a href="#" onclick="themdong('nhapkho',<?php echo ++$stt;?>)" >Thêm </a>
    </div>
    
</div> 
