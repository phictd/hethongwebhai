<?php
require_once('../../../libraries/oop.php');
require_once('../../../libraries/loaihang.php');
$a= new LoaiHang;
$id=$_GET['id'];

$a->set_idloai($id);
$a->delete_loaihang();

?>
<div align="center">
	<table align="center"  width="600" id="tableloaihang" >
    	<tr>
        	<td class=title>STT</td>
        	<td class=title>Tên Loại</td>
        	<td class=title>Sửa</td>
        	<td class=title>Xóa</td>                                                
        </tr>
<?php
	$data=$a->listloaihang();
	$stt=0;
	foreach($data as $item){
		$stt++;
		echo "<tr>";
		echo "<td align=center>$stt</td>";
		echo "<td align=center><input type='text' id='$item[idLoaiHang]' value='$item[TenLoai]' size='25'/></td>";
		
		echo "<td align=center><a href='#' onclick='sualoaihang($item[idLoaiHang],document.getElementById($item[idLoaiHang]).value)'>Sửa</a></td>";
		echo "<td align=center><a href='#' onclick='xoaloaihang($item[idLoaiHang])'>Xóa</a></td>";
		echo "</tr>";
	}
	

?>
    </table>
    </div>
</div> 