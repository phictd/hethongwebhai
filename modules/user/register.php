<?php
session_start();
require("libraries/user.php");
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == NULL){
		echo "Tên đăng nhập không để trống <br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == NULL){
		echo "Mật khẩu không để trống <br />";
	}else{
		if($_POST['txtpass'] != $_POST['txtrepass']){
			echo "Nhắc lại mật khẩu không đúng";
		}else{
			$p=$_POST['txtpass'];
		}
	}
	if($_POST['txtemail'] == NULL){
		echo "Email không để trống <br />";
	}else{
		$e=$_POST['txtemail'];
	}
	if($_POST['txtmxn'] == NULL || $_SESSION['ma'] != $_POST['txtmxn']){
		echo "Mã xác nhận không đúng<br />";
	}
	if($_POST['txtht'] == NULL){
		echo "Họ tên không để trống <br />";
	}else{
		$ht=$_POST['txtht'];
	}
	if($_POST['txtdc'] == NULL){
		echo "Địa chỉ không để trống <br />";
	}else{
		$dc=$_POST['txtdc'];
	}
	if($_POST['txtdt'] == NULL){
		echo "Số điện thoại không để trống <br />";
	}else{
		$dt=$_POST['txtdt'];
	}
	if($u && $p &&  $e &&  $ht &&  $dc &&  $dt){
		$lv=0;
		$dk = new User;
		$dk->set_user($u);
		$dk->set_pass($p);
		$dk->set_email($e);
		$dk->set_hoten($ht);
		$dk->set_diachi($dc);
		$dk->set_dienthoai($dt);
		$dk->set_level($lv);
		 $ngaydk = date(d);
        $thangdk = date(m);
        $namdk = date(Y);
        $ngay = "$ngaydk-$thangdk-$namdk";
		$dk->set_ngaydangky($ngay);
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
				echo "<div align='center' style='margin:10px;'><font size='+1' color='#FF0033'>Đăng ký thành công !</font></div>";	
			}
		
		}
		
	}	
}else{?>


<form action="index.php?module=user&act=register" method="post" name="f">
            <fieldset>
            <legend align="center"><font size="+1">Đăng Ký Thành Viên</font></legend>
            <fieldset>
            <legend>Tài Khoản</legend>
            <label>Tên tài khoản:</label> <input type="text" name="txtuser" size="25" /><br />
            <label>Mật khẩu:</label> <input type="password" name="txtpass" size="25" /><br />
             <label>Nhập lại mật khẩu:</label> <input type="password" name="txtrepass" size="25" /><br />
            <label>Email:</label> <input type="text" name="txtemail" size="30" /><br />
            <label>Mã xác nhận:</label><div style="padding-top:3px" id="thu"><font size="4"> 
            							<?php
										
										$t= Time();
										$maxn=(substr($t,-4));
										echo $maxn;
										$_SESSION['ma']=$maxn;
										?>
                                       </font></div><br/>
            <label>&nbsp;</label> <input type="text" name="txtmxn" size="4" /><br />
            </fieldset>
            <fieldset>
            <legend>Thông Tin Cá Nhân</legend>
            <label>Họ tên:</label> <input type="text" name="txtht" size="30" /><br />					
            <label>Địa chỉ:</label> <input type="text" name="txtdc" size="50" /><br />
            <label>Ngày sinh:</label><select name="day"><?php
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
				for($i=1975;$i<=$now;$i++){
					echo "<option value=$i>$i</option>";
				}
			?>
            </select><br/>
            <label>Giới tính:</label><input type="radio" name="gioitinh" value="1" checked="checked"/>Nam
            							<input type="radio" name="gioitinh" value="0" />Nữ<br/>
            <label>Điện thoại:</label> <input type="text" name="txtdt" size="12" />
            </fieldset>
            <label>&nbsp;</label><input style="margin-left:80px; color:#333;" type="submit" name="ok" value="Đăng ký" />
            				<input type="reset" name="reset" style="color:#333;" value="Nhập lại" />
            </fieldset>         
            </form>
 <?php }?>