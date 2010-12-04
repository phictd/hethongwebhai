<div align="center">	
	<table align="center"  width="600px" id="tableloaihang" >
    	<tr height="20px">
        	<td class=title width="100px">STT</td>
        	<td class=title width="300px">Tên Loại</td>
        	<td class=title width="100px">Sửa</td>
        	<td class=title width="100px">Xóa</td>                                                
        </tr>
<?php
	
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
	$a= new LoaiHang;
	$data=$a->listloaihang();
	$stt=0;
	foreach($data as $item){
		$stt++;
		echo "<tr height='20px'>";
		echo "<td align=center width='100px'>$stt</td>";
		echo "<td align=center width='300px'><input type='text' id='$item[idLoaiHang]' value='$item[TenLoai]' size='25'/></td>";
		
		echo "<td align=center width='100px'><a href='#' onclick='sualoaihang($item[idLoaiHang],document.getElementById($item[idLoaiHang]).value)'>Sửa</a></td>";
		echo "<td align=center  width='100px'><a href='#' onclick='xoaloaihang($item[idLoaiHang])'>Xóa</a></td>";
		echo "</tr>";
	}
	
	

?>
    </table>
    <div id='them'></div>
    <a href="#" onclick="themloaihang(<?php echo ++$stt;?>)" >Thêm </a>
    </div>
</div> 