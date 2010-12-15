<div align="center">	
	<table align="center"  width="600px" id="tableloaihang" >
    	<tr height="20px">
        	<td class=title width="100px">STT</td>
        	<td class=title width="150px">Tài Khoản</td>
            <td class=title width="150px">Chức Vụ</td>
            <td class=title width="100px">Chi Tiết</td>
            <td class=title width="100px">Sửa</td>
        	<td class=title width="100px">Xóa</td>                                                
        </tr>
<?php
 ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/user.php');
	$u= new User;
	$data_u=$u->listuser();
	$stt=0;
	foreach($data_u as $item_u){
		$stt++;
		echo "<tr height='20px'>";
		echo "<td align=center width='100px'>$stt</td>";
		echo "<td align=center width='150px'><input type='text' id='$username$stt' value='$item_u[Username]' size='25'/></td>";
		echo "<td align=center width='150px'><select id='level$stt'> ";
		?>
			<option value='2'>Admin</option>
            <option value='1' <?php if($item_u['Level']==1) echo "selected"; ?>>User</option>
            <?php
		
		echo "</select></td>";
		echo "<td align=center  width='100px'><a href='modules/user/chitiet.php?username=$item_u[Username]' target='_blank'>Xem</a></td>";
		?>
			<td align=center width='100px'> <a href='#' onclick="suauser('<?php echo $item_u[Username];?>',document.getElementById('level<?php  echo $stt;?>').value)">Sửa</a></td>
        <?php
		echo "<td align=center  width='100px'><a href='#' onclick='xoacongty($item[idCongTy])'>Xóa</a></td>";
		echo "</tr>";
	}
	
?>
    </table>
    <div id='them'></div><br />
    <div id="thongbao"></div>
    <a href="#" onclick="themdong('user',<?php echo ++$stt;?>)" >Thêm </a>
    </div>
    
</div> 
