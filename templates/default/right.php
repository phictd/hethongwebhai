</div>
<div id="right">
<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
?>
<div id="login">Welcome back, <?php echo $_SESSION['username']; ?></div>
<?php if($_SESSION['level']==2){	?>
<div><a href="admin/index.php">Trang quan tri</a></div>
<?php }?>
<div><a href="index.php?module=user&act=logout">Logout</a></div>
<?php
}else{
echo "<div>";
$tam='';
if($_GET[module]=='giohang') $tam='&co=2';
echo "<form action='index.php?module=user&act=check_login".$tam."' method='post'>";
          echo " <fieldset>";
           echo "<legend>Đăng nhập</legend>";
         echo "  <label>Tên đăng nhập:</label> <br/><input type='text' name='txtuser' size='15' /><br />";
         echo "  <label>Mật khẩu:</label><br/> <input type='password' name='txtpass' size='15' /><br />";
         echo "  <input type='submit' name='ok' value='Đăng nhập' />";
          echo " <a href='index.php?module=user&act=register'><input type='submit' name='dk' value='Đăng ký' /></a>";
           echo "</fieldset>";
           echo " </form>";
echo "</div>";

}?>

<div id="right_content">
   		<div id="shopping_cart">
        	<h1>Giỏ Hàng</h1>
            
            <div id="cart_details">
                <?php echo $_SESSION['tongsl']." Mặt hàng";?> <br />
           <span id="border_cart"></span>
            Tổng: <span id="price"><?php echo $_SESSION['thanhtien']." VND";?></span>
            </div>
            <a href="index.php?module=giohang&act=xem"><img src="images/icons/cart.jpg" border="0px" width="40" height="40" /></a>
            </div>
<div id="bg_dongho">
			<embed type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" wmode="transparent" src="images/icons/dongho.swf" width="180" height="180"></embed>
             </div>
<div class="news"><img align="middle" src="images/icons/qcright2.png"/></div>
        	<fieldset>
            	<legend><img src="images/icons/TopSellerNumber1Bg.png"/></legend>
            	<label><img src="images/laptop/laptop1.jpg" width="100"  align="middle"/><a href="#">Acer Aspire 3935 742G25Mn.014( Linux )</a>
<font color="#FF6633"> 14.050.000VND </font>
</label>
            </fieldset>
<div class="news"><img src="images/icons/TopSellerNumberBg2.gif" />&nbsp;<a href="#">HP Compaq 2230s NB535PA (PC Dos)</a><br/><font color="#FF0066">14.050.000VND</font>
<div class="cls"></div>
</div>


<div class="news"><img src="images/icons/TopSellerNumberBg3.gif" />&nbsp;<a href="#">Compaq Presario CQ20 311TU ( NM537PA)</a><br/><font color="#FF0066">13.699.000VND
</font>
<div class="cls"></div>
</div>

<div class="news"><img src="images/icons/TopSellerNumberBg4.gif" />&nbsp;<a href="#">Tấm dán bàn phím Laptop</a><br/><font color="#FF0066"><br/>50.000VND
</font>
<div class="cls"></div>
</div>

<div class="news"><img align="middle" src="images/icons/qcright1.png"/></div>
<div class="news"><a href="#">Laptop Lenovo IdeaPad G460 - 8919 (5904-8919)</a><br/><font color="#FF0066">13.190.000VND
</font>
<div class="cls"></div>
</div>

<div class="news"><a href="#">Laptop Lenovo Ideapad S10-3c (5905-6520)</a><br/><font color="#FF0066">7.363.000VND</font>
<div class="cls"></div>
</div>

<div class="news"><a href="#">Laptop Lenovo IdeaPad G450 - 5347 (5905-5347)</a><br/><font color="#FF0066">8.500.000VND</font>
<div class="cls"></div>
</div>

<div class="news"><img align="middle" src="images/icons/qcright1.png"/></div>
<div class="news"><a href="#">laptop HP Pavilion DV8-1003TX (VU991PA ) màn 18.4 inch Full HD + CPU Core i7<br/></a><br/><font color="#FF0066">37.700.000VND</font>
<div class="cls"></div>
</div><div class="news"><a href="#">laptop Apple MacBook Pro (MB991ZP/A)</a><br/><font color="#FF0066">34.490.000VND</font>
<div class="cls"></div>
</div><div class="news"><a href="#">Laptop HP Compaq CQ40-630TU(W026PA)</a><br/><font color="#FF0066">9.800.000VND</font>
<div class="cls"></div>
</div>

</div>