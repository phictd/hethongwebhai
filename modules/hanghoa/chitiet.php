﻿<?php
		 ini_set( "display_errors", 0);
		require_once('libraries/hanghoa.php');
		$id=$_GET['id'];
		$b= new HangHoa;
		$b->set_idHang($id);
		$data1=$b->getHang();
	
?>
<style >
#chitiet
{
width:600px;
border: 1px solid #c6dbef;
margin:0px 0px 0px 20px;

}
#chitiet h1
{
    font-size: 15px;
    background: #f7f3f7;
    height: 25px;
    padding:5px;
    border-bottom: 1px solid #c6dbef;
    line-height: 25px;
    color:#ff0000;
}
#khung
{
    overflow: hidden;
    margin:15px 0px 0px 0px;
}
#khung img
{
    border:2px solid #c6dbef;
    margin: 5px 15px 5px 5px;
    float:left;


    
}

#khung p.red1
{
    color:#8ca208;
    font-size:15px;
    padding: 5px;
font-weight:bold;
}
#khung p.red
{
    color:red;
    font-size: 12px;
}
#khung p.black
{
    color:#390000;
	padding:5px;
	font-size:14px;

}

</style>
<div id="chitiet">
    <h1>THÔNG TIN SẢN PHẨM</h1>
    <div id="khung">
      <?php echo "<img src=$data1[UrlHinh] width='170' height='150' />";?> 

      <p class="red1"><?php echo $data1['TenHang'];?></p> 
      <p class="red">Giá:<?php echo number_format($data1['Gia'],"000"),"VND";?></p>
 	<p class="black"><?php echo $data1['MoTa'];?></p>

      <p><a href="index.php?module=giohang&act=them&ma=<?php echo $data1[idHang]; ?>&slhang=1"><img src="images/icons/addtocart.gif"/></a></p>
	
     
    </div>

</div>
