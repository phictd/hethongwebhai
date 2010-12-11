<?php
				require_once('libraries/hanghoa.php');
				$b= new HangHoa;
				$data1=$b->listhanghoa();
				foreach($data1 as $item1){
					/*echo "<div class='hanghoa'>";
					echo "<div class='imgsp'>";
					echo "<img src=$item1[UrlHinh] />";
					echo "</div>";
					echo "<div class='tensp'>";
					echo "<a href='#'>$item1[TenHang]</a>";
					echo "</div>";
					echo "<div class='cls'></div>";
					echo "</div>";*/
					
		echo "<div class='prod_box'>";
       // echo "<div class='top_prod_box'></div>";
        echo "<div class='center_prod_box'>";
		echo "<div class='product_img'><img src=$item1[UrlHinh] width='150' height='100'/></div>";
        echo "<div class='product_title'>$item1[TenHang]</div>";
        echo "<div class='product_title'>$item1[Gia]</div>";
        echo "</div>";
        /*echo "<div class='bottom_prod_box'></div>";
        echo "<div class='prod_details_tab'>";
        echo "<a href='index.php?module=giohang&act=them&ma=$itemhoakieng[ma]&slhoa=1'><img src='images/cart.gif' alt=''/></a>";
        echo "<a href='index.php?module=hoakieng&act=detail&id=$itemhoakieng[ma]' class='prod_details'>ChiTiết</a>";
        echo "</div>";*/
        echo "</div>";	
					
				}
?>