<?php
session_start();
require_once("libraries/donhang.php");
if(isset($_SESSION['username'])){
$donhang = new donhang();
//$chitiet = new chitietdonhang();
if(isset($_POST['ok'])){
    if($_POST['txtten'] == null){
        $loithongtin[] = "Vui lòng Nhập Tên";
    }else{
        $tenkh = $_POST['txtten'];
    }
    if($_POST['txtsodt'] == null){
        $loithongtin[] = "Vui Lòng Nhập Số Điện Thoại";
    }else{
        $sodt = $_POST['txtsodt'];
    }
    if($_POST['txtdc'] == null){
        $loithongtin[] ="Vui Lòng Nhập Địa Chỉ";
    }else{
        $dc = $_POST['txtdc'];
    }
    if($tenkh && $sodt && $dc){
        $madh = time();
        $donhang->setMadh($madh);
        $donhang->setHoTen($tenkh);
        $donhang->setSoDT($sodt);
        $donhang->setDiaChi($dc);
        $ngaydat = date(d);
        $thangdat = date(m);
        $namdat = date(Y);
        $ngay = "$ngaydat-$thangdat-$namdat";
        $donhang->setNgayDat($ngay);
        $donhang->setThanhTien($_SESSION['thanhtien']);
        if($donhang->ThemDonHang() == FALSE){
            $loithongtin[] = "Thêm không Thành công";
        }else{
            for($f=1 ;$f <= $_SESSION['tongsl'];$f++){
                $chitiet->setMadh($madh);
                $chitiet->setMahang($_SESSION['mahoa'.$f]);
                $chitiet->setGia($_SESSION['gia'.$f]);
                $chitiet->setSoLuong($_SESSION['soluong'.$f]);
                $chitiet->ThemChiTietHang();
            }
            //$loithongtin[] = "Thêm Thành Công";
            echo "<h3 align='center'>Đã Gửi Đơn hàng .Thanks You!</h3>";
        }
    }
for($i=1;$i<=$_SESSION["tongsl"];$i++){
session_unregister('mahoa'.$i);
session_unregister('tenhoa'.$i);
session_unregister('soluong'.$i);
session_unregister('gia'.$i);
}
$_SESSION["tongsl"]=0;
$_SESSION['thanhtien'] = 0;
}
if($loithongtin != ""){
		echo "<ul>";
		foreach($loithongtin as $err){
			echo "<li>$err</li>";
		}
		echo "</ul>";
	}
}
else{
	echo "Ban can dang nhap";
	header("location:index.php?module=giohang&act=xem&co=1");
	}
?>
<form action="index.php?module=giohang&act=dathang" method="post">
    
            <fieldset>
            <legend>Mua Hàng</legend>
            <label>Họ Tên:</label> <input type="text" name="txttenkh" size="25" /><br />
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
            <label>&nbsp;</label><input type="submit" name="ok" value="Mua" /> 
            </fieldset>         
            </form>
