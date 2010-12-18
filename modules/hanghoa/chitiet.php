<?php
		 ini_set( "display_errors", 0);
		require_once('libraries/hanghoa.php');
		$id=$_GET['id'];
		$b= new HangHoa;
		$b->set_idHang($id);
		$data1=$b->getHang();
	
?>
<div align="center">
<table width="200" align="center" border="1">
  <tr>
    <td align="center"><?php echo "<img src=$data1[UrlHinh] width='170' height='150' />";?></td>
  </tr>
  <tr>
    <td align="center"><?php echo $data1['TenHang'];?></td>
  </tr>
  <tr>
    <td align="center"><?php echo $data1['Gia'];?></td>
  </tr>
  <tr>
    <td align="center"><?php echo $data1['MoTa'];?></td>
  </tr>
  <tr>
    <td align="center">
    <a href="index.php?module=giohang&act=them&ma=<?php echo $data1[idHang]; ?>&slhang=1"><img src="images/icons/cart.gif"/></a>
    </td>
  </tr>
</table>
</div>