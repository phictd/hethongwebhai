<?php
		 ini_set( "display_errors", 0);
		require_once('libraries/hanghoa.php');
		$id=$_GET['id'];
		$b= new HangHoa;
		$b->set_idhang($id);
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
      <?php 
	  foreach($data1 as $data){
	  echo "<a href='#' rel='addToCart' onclick='getdata($data[idHang])' ><img src=$data[UrlHinh] width='170' height='150' /></a>";
	
      echo "<p class='red1'>$data[TenHang]</p> ";
      echo "<p class='red'>Giá:".number_format($data['Gia'])." VND</p>";
 	echo "<p class='black'>$data[MoTa]</p>";

      echo "<a href='#' rel='addToCart' onclick='getdata($data[idHang])' ><img src='images/icons/addtocart.gif' /></a>";
	  }
     ?> 
    </div>

</div>
