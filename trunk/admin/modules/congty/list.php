<div align="center">	
	<table align="center"  width="600px" id="tableloaihang" >
    	<tr height="20px">
        	<td class=title width="100px">STT</td>
        	<td class=title width="100px">Tên Loại</td>
            <td class=title width="200px">Tên Công Ty</td>
        	<td class=title width="100px">Sửa</td>
        	<td class=title width="100px">Xóa</td>                                                
        </tr>
<?php
// ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
require_once('../../../libraries/loaihang.php');
	$congty= new CongTy;
	$loaihang=new LoaiHang;
	$data_loaihang=$loaihang->listloaihang();
	$data_congty=$congty->listcongty();
	$stt=0;
	foreach($data_congty as $item){
		$stt++;
		echo "<tr height='20px'>";
		echo "<td align=center width='100px'>$stt</td>";
		echo "<td align=center width='100px'><select id='loaihang'> ";
		foreach($data_loaihang as $item_loaihang){
			if($item['idLoaiHang']==$item_loaihang['idLoaiHang']) 
				$selected=" selected ";
			else
				$selected=' ';?>
			<option value='<?php echo $item_loaihang['idLoaiHang'];?>' <?php echo $selected;?>><?php echo $item_loaihang['TenLoai'];?></option>
            <?php
		}
		echo "</select></td>";
		echo "<td align=center width='200px'><input type='text' id='$item[idCongTy]' value='$item[TenCongTy]' size='25'/></td>";
		echo "<td align=center width='100px'><a href='#' onclick='suacongty($item[idCongTy],document.getElementById(loaihang).value,document.getElementById($item[idCongTy]).value)'>Sửa</a></td>";
		echo "<td align=center  width='100px'><a href='#' onclick='xoaloaihang($item[idCongTy])'>Xóa</a></td>";
		echo "</tr>";
	}
	
?>
    </table>
    <div id='them'></div><br />
    <div id="thongbao"></div>
    <div id="thu"></div>
    <a href="#" onclick="themdong('congty',<?php echo ++$stt;?>)" >Thêm </a>
    </div>
    
</div> 
