<div align="center">	
	<table align="center"  width="600px" id="tableloaihang" >
    	<tr height="20px">
        	<td class=title width="50px">STT</td>
        	<td class=title width="100px">Tên Loại</td>
            <td class=title width="130px">Tên Công Ty</td>
            <td class=title width="170px">Tên Hàng Hóa</td>
        	<td class=title width="50px">Chi Tiết</td>
            <td class=title width="50px">Sửa</td>
        	<td class=title width="50px">Xóa</td>                                                
        </tr>
<?php
 //ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/congty.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/hanghoa.php');
	$hanghoa=new HangHoa;
	$congty= new CongTy;
	$loaihang=new LoaiHang;
	$data_loaihang=$loaihang->listloaihang();
	$data_congty=$congty->listcongty();
	$data_hanghoa=$hanghoa->listhanghoa();
	$stt=0;
	foreach($data_hanghoa as $item_hanghoa){
		$stt++;
		echo "<tr height='20px'>";
		echo "<td align=center width='100px'>$stt</td>";
		echo "<td align=center width='100px'><select id='loaihangct".$stt."'> ";
		foreach($data_congty as $item_congty){
			if($item_hanghoa['idCongTy']==$item_congty['idCongTy']){
				foreach($data_loaihang as $item_loaihang){
					if($item_loaihang['idLoaiHang']==$item_congty['idLoaiHang']){
						$selected=" selected ";
					}else{
						$selected=' ';
					}
					?>
					<option value='<?php echo $item_loaihang['idLoaiHang'];?>' <?php echo $selected;?>><?php echo $item_loaihang['TenLoai'];?></option> <?php	}				
			}							
				
		}
		echo "</select></td>";
		echo "<td align=center width='200px'><select id='congty".$stt."'> ";
		foreach($data_congty as $item_congty){
			// ket congty & hanghoa
			if($item_congty['idCongTy']==$item_hanghoa['idCongTy']){	
				foreach($data_loaihang as $item_loaihang){
						// ket congty & loaihang
						if($item_loaihang['idLoaiHang']==$item_congty['idLoaiHang']){	
							//quay nguoc lai show cac congty cua loaihang do 					
							foreach($data_congty as $item_congtyshow){
								// neu congty thuoc loaihang thi select = ket loaihang& congty
								if($item_loaihang['idLoaiHang']==$item_congtyshow['idLoaiHang']){
									// neu hanghoa thuoc congty
									if($item_congtyshow['idCongTy']==$item_hanghoa['idCongTy']){
										$selected=" selected ";
									}else{
										$selected=' ';
									}
									?>
								<option value='<?php echo $item_congtyshow['idCongTy'];?>' <?php echo $selected;?>><?php echo $item_congtyshow['TenCongTy'];?></option> <?php		
								}
							}
						}										
				}
			}
		}	
		echo "</select></td>";
		echo "<td align=center width='200px'><input type='text' id='hh$item_hanghoa[idHang]' value='$item_hanghoa[TenHang]' size='20'/></td>";
		
		echo "<td align=center  width='100px'><a href='#' onclick='xemchitiet($item_hanghoa[idHang])'>Xem</a></td>";?>
        
			<td align=center width='100px'> <a href='#' onclick="suacongty(<?php echo $item[idCongTy];?>,document.getElementById('loaihangct<?php  echo $stt;?>').value,document.getElementById('<?php echo $item[idCongTy];?>').value)">Sửa</a></td>
        <?php
		echo "<td align=center  width='100px'><a href='#' onclick='xoacongty($item[idCongTy])'>Xóa</a></td>";
		echo "</tr>";
	}
	
?>
    </table>
    <div id='them'></div><br />
    <div id="thongbao"></div>
    <a href="#" onclick="themdong('congty',<?php echo ++$stt;?>)" >Thêm </a>
    </div>
    
</div> 


