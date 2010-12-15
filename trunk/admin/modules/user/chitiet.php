<link href="calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar.js"></script>
<?php 
//ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/user.php');
require_once('../../../libraries/function.php');
require_once('classes/tc_calendar.php');

$username=$_GET['username'];

$a=new User;
$a->set_user($username);
$data=$a->getdata();
$hoten=$data[HoTen];
$diachi=$data[DiaChi];
$dienthoai=$data[DienThoai];
$email=$data[Email];
$ngay=$data[NgaySinh];
$pass=$data[Password];

$namsinh=substr($ngay,0,4);
$thangsinh=substr($ngay,5,2);
$ngaysinh=substr($ngay,8,2);

if($data[GioiTinh]==1)$gioitinh='Nam';
else
	if($data[GioiTinh]==2)$gioitinh='Nữ';
else
	$gioitinh='Không Biết';

if(isset($_POST['ok'])){		
		
		$u=new User;
		$u->set_user($username);
		$flag=TRUE;	
		if($_POST['txtpass']!=""){
			if($_POST['txtpass']==$pass){			
				if($_POST['txtpass1']==$_POST['txtpass2']){
					$u->set_pass($_POST['txtpass1']);				
				}
				else{
					$flag=FALSE;
					echo "Mật khẩu mới không giống nhau.";	
				}
			}else{
				echo "Mật khẩu không đúng.";
				$flag=FALSE;
			}
		}
		if($flag==TRUE){
			if($_POST['txthoten']!="")
				$u->set_hoten($_POST['txthoten']);
			if($_POST['txtdiachi']!="")
				$u->set_diachi($_POST['txtdiachi']);
			if($_POST['txtdienthoai']!="")
				$u->set_dienthoai($_POST['txtdienthoai']);
			if($_POST['txtemail']!="")
				$u->set_email($_POST['txtemail']);
			if($_POST['txtpass']!="")
				$u->set_pass($_POST['txtpass1']);
			
			$u->set_gioitinh($_POST['rgioitinh']);			
			
			$ngaysinh=$_POST['date1_day'];
			$thangsinh=$_POST['date1_month'];
			$namsinh=$_POST['date1_year'];
			
			$ngay=$namsinh."-".$thangsinh."-".$ngaysinh;			
			
			$u->set_ngaysinh($ngay);
			
			$u->update_chitiet();	
			dongcuaso();
			exit();
		}
			
		
		
		
		

	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thông Tin Người Dùng</title>
<style type="text/css">
@charset "utf-8";
*{
margin:0px;
color:black;
}

body{
font:12px verdana;
width:780px;
margin:auto;
}
table{
font:12px verdana;
text-align:center;
}

td{
border:#3C0 solid 1px;
}
.title{
	width:200px;
background:green;
color:#FFFFFF;
font-weight:900;
}
.info{
	width:300px;
}
h3{
	color:#F93;
	font-weight:900;
	font:30px Verdana;
}
legend{
color:#009933;
font-weight:900;
}

fieldset{
border:1px solid #0099FF;
margin:5px;
}
label{
	text-align:left;
width:120px;
float:left;
padding:0px;
font-weight:900;
margin-top:3px;
}

</style>
</head>

<body>
<form action="chitiet.php?username=<?php echo $username;?>" method="post" name="frm" enctype="multipart/form-data" >
<table width="600px">
	<tr>
    	<td class="title">Tài Khoản </td>
        <td class="info"><h3><?php echo $username;?></h3></td>
    </tr>
    <tr>
    	<td class="title">Mật khẩu</td>
        <td class="info">
        	<fieldset>
            	<legend>Đổi mật khẩu</legend>
        				<label>MK hiện tại </label><input type="password" name="txtpass" size="20" value="<?php if($a->get_pass()!="") echo "******";?>" /><br />
        				<label>MK mới </label><input type="password" name="txtpass1" size="20" /><br />
        				<label>Đánh lại MK mới </label><input type="password" name="txtpass2" size="20" />
                
            </fieldset>          
        </td>
    </tr>
    <tr>
    	<td class="title">Họ Tên</td>
        <td class="info"><input type="text" name="txthoten" size="30" value="<?php echo $hoten;?>" /></td>
    </tr>
    <tr>
    	<td class="title">Địa Chỉ</td>
        <td class="info"><input type="text" name="txtdiachi" size="30" value="<?php echo $diachi;?>" /></td>
    </tr>
    
    <tr>
    	<td class="title">Điện Thoại</td>
        <td class="info"><input type="text" name="txtdienthoai" size="30"value="<?php echo $dienthoai;?>" /></td>
    </tr>
    <tr>
    	<td class="title">Email</td>
        <td class="info"><input type="text" name="txtemail" size="30" value="<?php echo $email;?>"/></td>
    </tr>
        
    <tr>
    	<td class="title">Ngày Sinh</td>
        <td class="info">
        <form id="form2" name="form2" method="post" action="">
		<?php
	  $myCalendar = new tc_calendar("date1", true);
	  $myCalendar->setIcon("images/iconCalendar.gif");
	  $myCalendar->setDate($ngaysinh,$thangsinh,$namsinh);
	  $myCalendar->setPath("./");
	  $myCalendar->setYearInterval(1920,  date('Y',time()));
	  $myCalendar->dateAllow('1960-01-01', '2015-03-01');
	  //$myCalendar->setHeight(350);	  
	  //$myCalendar->autoSubmit(true, "form1");
	  $myCalendar->disabledDay("Sat");
	  $myCalendar->disabledDay("sun");
	  $myCalendar->writeScript();
	  ?>
      
      </form>
      </td>
    </tr>
    <tr>
    	<td class="title">Giới Tính </td>
        <td class="info">Nam<input type="radio" name="rgioitinh" value="1" checked="checked"/>Nữ     <input type="radio" name="rgioitinh" value="2"<?php if($gioitinh=='Nữ') echo " checked='checked'";?>/></td>
    </tr>
       
    <tr>
    	<td class="title"> </td>
        <td class="info"><input type="submit" name="ok" value="Lưu" /><input type="button" name="close" value="Đóng" onclick="window.close()" /></td>
    </tr>
</table>
</form>
</body>
</html>
