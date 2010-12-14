<div align="center">	
	<table align="center"  width="730px" id="tableloaihang" >
    	<tr height="20px">
        	<td class=title width="30px">STT</td>
        	<td class=title width="100px">Tên Loại</td>
            <td class=title width="100px">Tên Công Ty</td>
            <td class=title width="100px">Tên Hàng Hóa</td>
            <td class=title width="100px">Giá</td>
            <td class=title width="100px">Số Lượng</td>
            <td class=title width="100px">Chi Tiết</td>        	
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
		echo "<td align=center width='30px'>$stt</td>";
		echo "<td align=center width='100px'><select id='loaihangct".$stt."' onchange=thaydoiloaihang(this.value,$stt)> ";
		foreach($data_congty as $item_congty){
			// ket hanghoa & congty
			if($item_hanghoa['idCongTy']==$item_congty['idCongTy']){
				foreach($data_loaihang as $item_loaihang){
					// ket loaihang & congty
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
		echo "<td align=center width='100px'><div id='congtyhh$stt'><select id='congty$stt'> ";
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
		echo "</select></div></td>";
		echo "<td align=center width='100px'><input type='text' id='hh$stt' value='$item_hanghoa[TenHang]' size='20' class='text'/></td>";
		echo "<td align=center width='100px'><input type='text' id='gia$stt' value='".$item_hanghoa[Gia]."' size='20' class='num'/></td>";
		echo "<td align=center  width='70px'><input type='text' id='soluong$item_hanghoa[idHang]' value='$item_hanghoa[SoLuong]' size='20' class='num' disabled='disabled'/></td>";
		echo "<td align=center width='100px'><a href='modules/hanghoa/chitiet.php?idhang=$item_hanghoa[idHang]' target='_blank'>Chi Tiết</a></td>";
		
		echo "<td align=center width='50px'> <a href='#' onclick=suahanghoa(".$item_hanghoa[idHang].",document.getElementById('congty$stt').value,document.getElementById('hh$stt').value,document.getElementById('gia$stt').value)>Sửa</a></td>";
        
		echo "<td align=center  width='50px'><a href='#' onclick='xoahanghoa($item_hanghoa[idHang])'>Xóa</a></td>";
		echo "</tr>";
	}
	
?>
    </table>
    <div id='them'></div><br />
    <div id="thongbao"></div>
    <a href="#" onclick="themdong('hanghoa',<?php echo ++$stt;?>)" >Thêm </a>
    </div>
    
</div> 

