<?php
				require_once('libraries/hanghoa.php');
				$b= new HangHoa;
				$A=9;
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
					echo "<div class='product_img'><a href='index.php?module=hanghoa&act=chitiet&id=$item1[idHang]' ><img src=$item1[UrlHinh] width='150' height='120'/></a></div>";
					echo "<div class='product_title'>$item1[TenHang]</div>";
					echo "<div class='product_title_price'>$item1[Gia]</div>";
				   	echo "<a style='margin-right:10px;' href='index.php?module=giohang&act=them&ma=$item1[idHang]&slhang=1'><img src='images/icons/cart.gif'/></a>";
					echo "<a href='index.php?module=hanghoa&act=chitiet&id=$item1[idHang]' >ChiTiết</a>";
					echo "</div>";
					echo "</div>";
					
				}
?>
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