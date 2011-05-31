<?php
				 ini_set( "display_errors", 0);

		$xml = simplexml_load_file("modules/hanghoa/hanghoa.xml");
		$TONGHANG = array();
		
		foreach ($xml->HANG as $H) { 
		$TONGHANG[] = array( 
							'idHang'=>$H->attributes()->idHang,
							'TenHang'=>(string)$H->TenHang,
							'Gia'=>(string)$H->Gia,
							'UrlHinh'=>(string)$H->UrlHinh
							
							);	
		}
		
		$HANGSHOW = array();
		$A = 9;
		if(isset($_GET['start'])){
			$X = $_GET['start'];
			$A =  $_GET['start'] + 9;
			for($X; $X < $A; $X++ ){
				if($TONGHANG[$X] == ""){
					break;
				}else{
					$HANGSHOW[] = $TONGHANG[$X];
				}
			
			}
			$X = $_GET['start'];
			$A = 9;
		}else{
			$X = 0;
			for($X; $X < $A; $X++){
				$HANGSHOW[] = $TONGHANG[$X];
			}	
			$X =0;
		}
			
		if(isset($_GET['page'])){
			$C = $_GET['page'];
		}else{
			$B = count($TONGHANG);
			$C = ceil($B/$A);
		}
				foreach($HANGSHOW as $item1){			
					echo "<div class='prod_box'>";
				 	echo "<div class='top_prod_box'></div>";
				   	echo "<div class='center_prod_box'>";
					echo "<div class='product_img'><a href='index.php?module=hanghoa&act=chitiet&id=$item1[idHang]' ><img src=$item1[UrlHinh] width='150' height='120'/></a></div>";
					echo "<div class='product_title'>$item1[TenHang]</div>";
					echo "<div class='product_title_price'>$item1[Gia]</div>";
				   	echo "<a style='margin-right:10px;' href='index.php?module=giohang&act=them&ma=$item1[idHang]&slhang=1' ><img src='images/icons/cart.gif'/></a>";
					echo "<a href='index.php?module=hanghoa&act=chitiet&id=$item1[idHang]' >ChiTiết</a>";
					echo "</div>";
					echo "</div>";
				}
?>
<div class="phantrang">
	<?php 
		if($C > 1){
				$D=$X/$A + 1;
				
				echo "day la X".$X,"<br />";
				echo "day la A".$A,"<br />";
				echo "day la D".$D,"<br /><br />";
				if($D != 1){
					$M= $X - $A;
					echo "<a href=index.php?start=$M&page=$C class=link><<</a>";
				}
				
				for($i=1;$i<= $C;$i++){
					if($i == $D){
						echo " <span class=active>$i</span> ";
					}
					
					else{
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