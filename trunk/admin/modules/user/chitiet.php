<?php 
//ini_set( "display_errors", 0);
require_once('../../../libraries/oop.php');
require_once('../../../libraries/user.php');
require_once('../../../libraries/function.php');

$username=$_GET['username'];


$a=new User;
$a->set_user($username);
$data=$a->getdata();
$hoten=$data[HoTen];
$diachi=$data[DiaChi];
$dienthoai=$data[DienThoai];
$email=$data[Email];
$ngaydangky=$data[NgayDangKy];
$ngaysinh=$data[NgaySinh];
if($data[GioiTinh]==1)$gioitinh='Nam';
else
	if($data[GioiTinh]==2)$gioitinh='Nữ';
else
	$gioitinh='Không Biết';

if(isset($_POST['ok'])){	
		if($_POST['txthoten']!="")
			$hoten=$_POST['txthoten'];
		if($_POST['txtdiachi']!="")
			$diachi=$_POST['txtdiachi'];
		if($_POST['txtdienthoai']!="")
			$dienthoai=$_POST['dienthoai'];
		if($_POST['txtemail']!="")
			$email=$_POST['email'];
		if($_POST['txtngaydangky']!="")
			$ngaydangky=$_POST['ngaydangky'];
		if($_POST['txtngaysinh']!="")
			$ngaysinh=$_POST['ngaysinh'];		
		if($_POST['rgioitinh']!="")
			$gioitinh=$_POST['rgioitinh'];
		else
			$gioitinh='Không Biết';
		if($_POST['txthoten']!="" || $_POST['txtdiachi']!="" || $_POST['txtdienthoai']!="" || $_POST['txtemail']!="" || $_POST['txtngaydangky']!="" || $_POST['txtngaysinh']!="" )
		{
			if($a->update_chitiet()){
				echo " Update Thành Công";			
			}else
				echo "Update không thành công";
		}
		
		
	dongcuaso();
	exit();
	
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
<form action="chitiet.php?username=<?php echo $username;?>" method="post" name="frm" enctype="multipart/form-data">
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
        				<label>MK mới </label><input type="password" name="txtpassn" size="20" /><br />
        				<label>Đánh lại MK mới </label><input type="password" name="txtpassn2" size="20" />
                
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
    	<td class="title">Ngày Đăng Ký</td>
        <td class="info"><input type="text" name="txtngaydangky" size="30"value="<?php echo $ngaydangky;?>" /></td>
    </tr>
    
    <tr>
    	<td class="title">Ngày Sinh</td>
        <td class="info"><input type="text" name="txtngaysinh" size="30"value="<?php echo $ngaysinh;?>" /></td>
    </tr>
    <tr>
    	<td class="title">Giới Tính</td>
        <td class="info">Nam<input type="radio" name="rgioitinh" value="Nam"/>Nữ     <input type="radio" name="rgioitinh" value="Nữ"/></td>
    </tr>
       
    <tr>
    	<td class="title"> </td>
        <td class="info"><input type="submit" name="ok" value="Lưu" /><input type="button" name="close" value="Đóng" onclick="window.close()" /></td>
    </tr>
</table>
</form>
</body>
</html>
