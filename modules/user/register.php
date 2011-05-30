<script language="javascript" src="calendar.js"></script>
<?php
session_start();
require_once('modules/user/classes/tc_calendar.php');
require("libraries/user.php");
$ngaysinh = $_POST['date1_day'];
$thangsinh = $_POST['date1_month'];
$namsinh = $_POST['date1_year'];
$lv=1;
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == NULL){
		$loi[] = "Tên đăng nhập không để trống <br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == NULL){
		$loi[] = "Mật khẩu không để trống <br />";
	}else{
		if($_POST['txtpass'] != $_POST['txtrepass']){
			$loi[] = "Nhắc lại mật khẩu không đúng";
		}else{
			$p=$_POST['txtpass'];
		}
	}
	if($_POST['txtemail'] == NULL){
		$loi[] = "Email không để trống <br />";
	}else{
		$e=$_POST['txtemail'];
	}
	if($_POST['txtmxn'] == NULL || $_POST['txtmxn'] != $_SESSION["security_code"]){
		$loi[] = "Mã xác nhận không đúng<br />";
	}
	if($_POST['txtht'] == NULL){
		$loi[] = "Họ tên không để trống <br />";
	}else{
		$ht=$_POST['txtht'];
	}
	if($_POST['txtdc'] == NULL){
		$loi[] = "Địa chỉ không để trống <br />";
	}else{
		$dc=$_POST['txtdc'];
	}
	
	if($_POST['txtdt'] != ""){
		if(is_numeric($_POST['txtdt'])){	
			$dt=$_POST['txtdt'];
		}else{
			$loi[] = "Số điện thoại không hợp lê <br />";
		}
	}
		
	if($loi != ""){
			echo "<ul>";
				foreach($loi as $err){
					echo "<li>$err</li>";
		}	
				echo "</ul>";
	}else{
		if($u && $p &&  $e &&  $ht &&  $dc &&  $dt){
			$lv=1;
			$dk = new User;
			$dk->set_user($u);
			$dk->set_pass($p);
			$dk->set_email($e);
			$dk->set_hoten($ht);
			$dk->set_diachi($dc);
			$dk->set_dienthoai($dt);
			$dk->set_level($lv);
			$ngaydk = date("d");
			$thangdk = date("m");
			$namdk = date("Y");
			$ngaydk = "$namdk-$thangdk-$ngaydk";
			$ngaysinh = "$namsinh-$thangsinh-$ngaysinh";
			$dk->set_ngaydangky($ngaydk);
			$dk->set_ngaysinh($ngaysinh);
			if($dk->check_user()==FALSE){
				echo "<div align='center' style='margin:10px;'><font size='+1' color='#FF0033'>Tên này đã có người dùng</font></div>";
			}
			if($dk->check_email()==FALSE){
				echo "<div align='center' style='margin:10px;'><font size='+1' color='#FF0033'>Email này đã có người dùng</font></div>";
			}
			else{
				if($dk->insert_user()==FALSE){
					echo "<div align='center' style='margin:10px;'><font size='+1' color='#FF0033'>Đăng ký thất bại</font></div>";
				}
				else{
					$dk->insert_user();
					echo "<div align='center' style='margin:10px;'><font size='+1' color='#FF0033'>Đăng ký thành công !</font></div>";	
				}
			
			}
		}
	}	
}else{?>


<form action="index.php?module=user&act=register" method="post" name="f">
            <fieldset>
            <legend align="center"><font size="+1">Đăng Ký Thành Viên</font></legend>
            <fieldset>
            <legend>Tài Khoản</legend>
            <label>Tên tài khoản:</label> <input type="text" name="txtuser" size="25" /><font color="#FF0000">*</font><br />
            <label>Mật khẩu:</label> <input type="password" name="txtpass" size="25" /><font color="#FF0000">*</font><br />
             <label>Nhập lại mật khẩu:</label> <input type="password" name="txtrepass" size="25" /><font color="#FF0000">*</font><br />
            <label>Email:</label> <input type="text" name="txtemail" size="30" /><font color="#FF0000">*</font><br />
            <label>Mã xác nhận:</label><div style="padding-top:3px" id="thu"> <img src="libraries/random_image.php" /></div><br/>
            <label>&nbsp;</label> <input type="text" name="txtmxn" size="6" /><font color="#FF0000">*</font><br />
            </fieldset>
            <fieldset>
            <legend>Thông Tin Cá Nhân</legend>
            <label>Họ tên:</label> <input type="text" name="txtht" size="30" /><font color="#FF0000">*</font><br />					
            <label>Địa chỉ:</label> <input type="text" name="txtdc" size="50" /><font color="#FF0000">*</font><br />
            <label>Ngày sinh:</label> <form id="form2" name="form2" method="post" action="">
                    <?php
                  $myCalendar = new tc_calendar("date1", true);
                  $myCalendar->setIcon("images/iconCalendar.gif");
                  $myCalendar->setDate($ngaysinh,$thangsinh,$namsinh);
                  $myCalendar->setPath("user/calendar_form.php");
                  $myCalendar->setYearInterval(1920,  date("Y"));
                  $myCalendar->dateAllow('1960-01-01', '2015-03-01');
                  //$myCalendar->setHeight(350);	  
                  //$myCalendar->autoSubmit(true, "form1");
                  $myCalendar->disabledDay("Sat");
                  $myCalendar->disabledDay("sun");
                  $myCalendar->writeScript();
                  ?>
                  
                  </form><br/>
            <label>Giới tính:</label><input type="radio" name="gioitinh" value="1" checked="checked"/>Nam
            							<input type="radio" name="gioitinh" value="0" />Nữ<br/>
            <label>Điện thoại:</label> <input type="text" name="txtdt" size="12" /><font color="#FF0000">*</font>
            </fieldset>
            <label>&nbsp;</label><input style="margin-left:80px; color:#333;" type="submit" name="ok" value="Đăng ký" />
            				<input type="reset" name="reset" style="color:#333;" value="Nhập lại" />
            </fieldset>        
            </form>
 <?php }?>