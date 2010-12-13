<?php
				require_once('libraries/hanghoa.php');
				$b= new HangHoa;
		
		
				$A=6;
				if(isset($_GET['page'])){
					$C=$_GET['page'];
				}else{
					$B=$b->dem();
					$C=ceil($B/$A);
				}
				if(isset($_GET['start'])){
					$X=$_GET['start'];
				}else{
					$X=0;
				}
		
		
				$data1=$b->listhanghoa6($X,$A);
				foreach($data1 as $item1){			
					echo "<div class='prod_box'>";
				 	echo "<div class='top_prod_box'></div>";
				   	echo "<div class='center_prod_box'>";
					echo "<div class='product_img'><img src=$item1[UrlHinh] width='150' height='120'/></div>";
					echo "<div class='product_title'>$item1[TenHang]</div>";
					echo "<div class='product_title'>$item1[Gia]</div>";
				   	echo "<a href='index.php?module=giohang&act=them&ma=$item1[idHang]&slhang=1'><img src='images/icons/cart.gif'/></a>";
					echo "<a href='index.php?module=hoakieng&act=detail&id=$itemhoakieng[ma]' >ChiTiết</a>";
					echo "</div>";
					echo "</div>";
					
				}
?>

<form action="index.php?module=giohang&act=dathang" method="post">
    
            <fieldset>
            <legend>Mua Hàng</legend>
            <label>Họ Tên:</label> <input type="text" name="txtuser" size="25" /><br />
            <label>Điện Thoại:</label> <input type="text" name="txtdt" size="25" /><br />
            <label>Địa Chỉ:</label> <input type="text" name="txtdc" size="50" /><br />
            <label>Ngày Giao:</label><select name="day"><?php
											for($i=1;$i<=31;$i++){
												echo "<option value=$i>$i</option>";
											}
											?>
									</select>
			Tháng: <select name="month">
			<?php
					$data=array("1"=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
					foreach($data as $k=>$v){
						echo "<option value=$k>$v</option>";
					}
			?>	
				</select>
			Năm:<select name="year">
			<?php
				$now=date("Y");
				for($i=2009;$i<=$now;$i++){
					echo "<option value=$i>$i</option>";
				}
			?>
            </select><br/>
            <label>Note:</label> <textarea name="txt" cols="25" rows="5" ></textarea><br />
            <label>&nbsp;</label><input type="submit" name="ok" value="Mua"/>
            </fieldset>         
            </form>
<div class="phantrang">
	<?php
			if($C > 1){
			$D=$X/$A + 1;
			if($D != 1){
				$M= $X - $A;
				echo "<a href=index.php?start=$M&page=$C class=link><<</a>";
			}
			for($i=1;$i<= $C;$i++){
				if($i == $D){
					echo " <span class=active>$i</span> ";
				}else{
					$M=($i-1)*$A;
					echo " <a href=index.php?start=$M&page=$C class=link>$i</a> ";
				}
			}
			if($D != $C){
				$M=$X + $A;
				echo "<a href=index.php?start=$M&page=$C class=link>>></a>";
			}
		}
	?>
</div>