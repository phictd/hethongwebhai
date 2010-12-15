<script language="javascript" src="modules/user/calendar.js"></script>
<?php
session_start();
require_once("libraries/donhang.php");
require_once("modules/user/classes/tc_calendar.php");

if(isset($_SESSION['username'])){
$donhang = new donhang();
//$chitietdonhang = new chitietdonhang();
if(isset($_POST['ok'])){
    if($_POST['txttennn'] == NULL){
        echo "Xin nhập họ tên<br/>";
    }else{
        $tennn = $_POST['txttennn'];
    }
    if($_POST['txtdt'] == NULL){
       echo "Xin nhập số điện thoại<br/>";
    }else{
        $dt = $_POST['txtdt'];
    }
    if($_POST['txtdc'] == NULL){
       echo "Xin nhập địa chỉ<br/>";
    }else{
        $dc = $_POST['txtdc'];
    }
	if($_POST['date1_day'] == 0){
       echo "Chưa chọn ngày giao<br/>";
    }else{
        $ngaygiao = $_POST['date1_day'];
    }
	if($_POST['date1_month'] == 0){
       echo "Chưa chọn tháng<br/>";
    }else{
        $thanggiao = $_POST['date1_month'];
    }
	if($_POST['date1_day'] == 0){
       echo "Chưa chọn năm giao<br/>";
    }else{
        $namgiao = $_POST['date1_year'];
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
            echo "<h3 align='center'>Đã gửi phiếu mua hàng. Xin cảm ơn quý khách !</h3>";
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
            <legend align="center"><font color="#0066FF" size="+2">Phiếu Mua Hàng</font></legend>
            <fieldset>
            <legend>Thông tin</legend>
            <label>Họ Tên Người Nhận:</label> <input type="text" name="txttennn" size="25" value="<?php echo $_SESSION['hoten']; ?>"/><br />
            <label>Điện Thoại:</label> <input type="text" name="txtdt" size="25" value="<?php echo $_SESSION['dienthoai']; ?>"/><br />
            <label>Địa Chỉ:</label> <input type="text" name="txtdc" size="50" value="<?php echo $_SESSION['diachi']; ?>"/><br />
            <label>Ngày Giao:</label> <form id="form2" name="form2" method="post" action="">
                    <?php
                  $myCalendar = new tc_calendar("date1", true);
                  $myCalendar->setIcon("images/iconCalendar.gif");
                  $myCalendar->setDate($ngaysinh,$thangsinh,$namsinh);
                  $myCalendar->setPath("user/calendar_form.php");
                  $myCalendar->setYearInterval(date("Y"),  date("Y")+1);
                  $myCalendar->dateAllow('1960-01-01', '2015-03-01');
                  //$myCalendar->setHeight(350);	  
                  //$myCalendar->autoSubmit(true, "form1");
                  $myCalendar->disabledDay("Sat");
                  $myCalendar->disabledDay("sun");
                  $myCalendar->writeScript();
                  ?>
                  
                  </form><br/>
            <label>Ghi chú:</label> <textarea name="txtghichu" cols="25" rows="5" ></textarea>
            </fieldset>
            <label>&nbsp;</label><input type="submit" name="ok" value="Mua" />
            <label>&nbsp;</label><input type="reset" name="reset" value="Mặc định" /> 
              </fieldset>       
            </form>
