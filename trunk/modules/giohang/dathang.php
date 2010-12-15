<script language="javascript" src="modules/user/calendar.js"></script>
<?php
session_start();
require_once("libraries/donhang.php");
require_once("modules/user/classes/tc_calendar.php");
$id= time();
if(isset($_SESSION['username'])){
	if(isset($_POST['ok'])){
	$donhang = new donhang();
	//$chitietdonhang = new chitietdonhang();

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
		if($tennn && $dt && $dc && $ngaygiao &&  $thanggiao && $namgiao  ){
			$donhang->set_idDonHang($id);
			$donhang->set_Username($_SESSION['username']);
			$donhang->set_TenNguoiNhan($tennn);
			$donhang->set_DienThoai($dt);
			$donhang->set_DiaDiemGiaoHang($dc);
			$tt=0;
			$donhang->set_TinhTrang($tt);
			$ngaydat = date('d');
			$thangdat = date('m');
			$namdat = date('Y');
			$dat = "$namdat-$thangdat-$ngaydat";
			$donhang->set_ThoiDiemDatHang($dat);
			$giao="$namgiao-$thanggiao-$ngaygiao";
			$donhang->set_ThoiDiemGiaoHang($giao);
			if($donhang->ThemDonHang() == FALSE){
				echo "<div align='center' style='margin:10px;'><font size='+1' color='#FF0033'>Không Tạo Được Phiếu Mua. Có Lỗi Xảy Ra !</font></div>";
			}else{
				echo "<div align='center' style='margin:10px;'><font size='+1' color='#999999'>Tạo Phiếu Thành Công. Xin Cảm Ơn Quý Khách !</font></div>";
			}
		}
	}
	unset($_SESSION['tongsl']);
	unset($_SESSION['thanhtien']);
 }
 else{
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
            <label>&nbsp;</label><input style="margin-left:80px; margin-top:5px;" type="submit" name="ok" value="Mua" />
            <label>&nbsp;</label><input type="reset" name="reset" value="Phiếu Mặc định" /> 
              </fieldset>       
            </form>