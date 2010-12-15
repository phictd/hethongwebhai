<form action="index.php?module=user&act=register" method="post">
            <fieldset>
            <legend align="center"><font size="+1">Đăng Ký Thành Viên</font></legend>
            <fieldset>
            <legend>Tài Khoản</legend>
            <label>Tên tài khoản:</label> <input type="text" name="txttk" size="25" /><br />
            <label>Mật khẩu:</label> <input type="password" name="txtpass" size="25" /><br />
             <label>Nhập lại mật khẩu:</label> <input type="password" name="txtrepass" size="25" /><br />
            <label>Email:</label> <input type="text" name="txtemail" size="30" /><br />
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
            							<input type="radio" name="gioitinh" value="2" />Nữ<br/>
            <label>Điện thoại:</label> <input type="text" name="txtdt" size="12" />
            </fieldset>
            <label>&nbsp;</label><input style="margin-left:80px; color:#333;" type="submit" name="ok" value="Đăng ký" />
            				<input type="reset" name="reset" style="color:#333;" value="Nhập lại" />
            </fieldset>         
            </form>