<div id="main">
    	<div id="left">
        	<h1>Sản Phẩm</h1>
           <ul id="verticalmenu">
             <?php
				require_once('libraries/oop.php');
				require_once('libraries/loaihang.php');
				require_once('libraries/hanghoa.php');
				$a= new LoaiHang;
				$data=$a->listloaihang();
				foreach($data as $item){
					echo "<li><a href='index.php?module=hanghoa&act=lhhloai&idloai=$item[idLoaiHang]'>$item[TenLoai] </a>";
					echo "<ul>";
					$a->set_idloai($item['idLoaiHang']);
					$datact=$a->listcongty();
					foreach($datact as $itemct){					
						echo "<li><a href='#'>$itemct[TenCongTy]</a></li>";
					}
					echo "</ul>";
					echo "</li>";
				}
			?>
           </ul>
           <div class="img">
           	<img src="images/icons/hotro.png" width="150" />
           </div>
           <div class="img1">
               Mr.Thời (Kinh doanh)
              <a href="ymsgr:SendIM?pilot_viet"><img src='http://opi.yahoo.com/online?u=pilot_viet&m=g&t=14'/></a>
           </div>
           <div class="img1">
               Mr.Đạt (Kinh doanh)
             <a href="ymsgr:SendIM?pilot_viet"><img src='http://opi.yahoo.com/online?u=pilot_viet&m=g&t=14'/></a>
           </div>
           <div class="img1">
               Mr.Thuật (Kinh Doanh)
             <a href="ymsgr:SendIM?pilot_viet"><img src='http://opi.yahoo.com/online?u=pilot_viet&m=g&t=14'/></a>
           </div>
           <div class="img1">
               Support by English
                <a href="#"><img src="images/icons/online(1).gif"/></a>
           </div>
          <div class="img1">
          	<a href="#"><img src="images/laptop/hinh/h1.jpg" width="145" height="100" name="h" style="filter:blendTrans(duration=3)" /></a>
          </div>
          <div class="img1">
          	<a href="#"><img src="images/laptop/anh/a1.jpg" width="145" height="100" name="h1" style="filter:chroma(Color = #000000) DropShadow(Color=#FF0000, OffX=2, OffY=2, Positive=1)" /></a>
          </div>
          <div class="img1">
          	<a href="#"><img src="images/laptop/hinh1/b1.jpg" width="145" height="100" name="h2" style="filter:blendTrans(duration=3)" /></a>
          </div>
          <div class="img1">
          	<a href="#"><img src="images/laptop/727_mainimage.jpg" width="145" /></a>
          </div>
          <div class="img1">
          	<a href="#"><img src="images/laptop/626.jpg" width="145" /></a>
          </div>
        </div>
 <div id="info">