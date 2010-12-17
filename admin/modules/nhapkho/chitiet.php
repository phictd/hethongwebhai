<?php 
require_once('../../../libraries/oop.php');
require_once('../../../libraries/phieunhap.php');
require_once('../../../libraries/chitietphieunhap.php');
require_once('../../../libraries/hanghoa.php');
require_once('../../../libraries/loaihang.php');
require_once('../../../libraries/function.php');
?>
<script language="javascript" type="text/javascript">
function obj(){
	td=navigator.appName;
	if(td == "Microsoft Internet Explorer"){
		dd= new ActiveXObject("Microsoft.XMLHTTP");	
	}else{
		dd= new XMLHttpRequest();	
	}
	return dd;
}

http=obj();

function themdongchitiet(stt){		
	http.open('get','themchitiet.php?stt='+stt,true);
	http.onreadystatechange=process_them;
	http.send(null);
}

function process_them(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('them').innerHTML=kq;
	}
}

function thaydoiloaihang(idloai){
	http.open('get','showcongty.php?idloai='+idloai,true);
	http.onreadystatechange=process_thaydoiloaihang;
	http.send(null);	
}
function layidcongty(idloai){
	http.open('get','layid.php?idloai='+idloai,true);
	http.onreadystatechange=process_layidcongty;
	http.send(null);	
}

function process_layidcongty(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		alert(kq);
		thaydoicongty(kq);
	}
}

function process_thaydoiloaihang(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;layidcongty(idloai);
		document.getElementById('congtyhh').innerHTML=kq;
		
	
	}
}

function thaydoicongty(idcongty){
	http.open('get','showhanghoa.php?idcongty='+idcongty,true);
	http.onreadystatechange=process_thaydoicongty;
	http.send(null);	
}
function process_thaydoicongty(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById('hanghoahh').innerHTML=kq;
	}
}



</script>
<?php 
ini_set( "display_errors", 0);


if(isset($_POST['dong'])){	
	dongcuaso();
	exit();
}
$id=$_GET['id'];
if(isset($_POST['ok'])){
	$idhang=$_POST['hanghoa'];
	$soluong=$_POST['soluong'];
	echo "<script>alert(".$idhang." ".$soluong.")</script>";
	$chitiet=new ChiTietPhieuNhap;
	$chitiet->set_idhang($idhang);
	$chitiet->set_idphieunhap($id);
	$chitiet->set_soluong($soluong);
	$chitiet->insert_chitietphieunhap();
	header("location:chitiet.php?id=$id");	
}

$a=new PhieuNhap;
$a->set_idphieunhap($id);
if(isset($_POST['xoa'])){	
	$a->delete_phieunhap();
	dongcuaso();
	exit();
}
$data=$a->getdata();

$ngaynhap=$data['NgayNhap'];

$nam=substr($ngaynhap,0,4);
$thang=substr($ngaynhap,5,2);
$ngay=substr($ngaynhap,8,2);
$ngaynhap=$ngay.'-'.$thang.'-'.$nam;

$tongtien=$data['TongTien'];
$ghichu=$data['GhiChu'];

$chitiet=new ChiTietPhieuNhap;
$chitiet->set_idphieunhap($id);
$data_chitiet=$chitiet->listchitietphieunhap();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chi Tiết Phiếu Nhập</title>
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
.title1{
background:green;
color:#FFFFFF;
font-weight:900;
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
.center{
	text-align:center;
}
.right{
	text-align:right;
}
tr{
	height:20px;
}
a{text-decoration:none
}
</style>
</head>

<body>
<form action="chitiet.php?id=<?php echo $id;?>" method="post" name="frm" enctype="multipart/form-data" >

<table width="600px">
	<tr>
    	<td class="title"> Mã Phiếu Nhập</td>
        <td class="info"><h3><?php if($data==0) echo "Phiếu này đã bị xóa";else echo $id;?></h3></td>
    </tr>
    <tr>
    	<td class="title">Ngày Nhập</td>
        <td class="info" ><input type="text" name="txthoten" size="30" value="<?php echo $ngaynhap;?>" disabled="disabled" class="center" /></td>        
    </tr>
    <tr>
    	<td class="title">Tổng Tiền</td>
        <td class="info"><input type="text" name="txthoten" size="30" value="<?php echo $tongtien;?>" disabled="disabled" class="center"/></td>
    </tr>
    <tr>
    	<td class="title">Ghi Chú</td>
        <td class="info"><input type="text" name="txtdiachi" size="30" value="<?php echo $ghichu;?>" disabled="disabled" class="center"/></td>
    </tr>    
</table>
<fieldset>
            	<legend>Chi Tiết Phiếu Nhập</legend>
        				<table width="600px">
                        <tr>
                            <td class="title1" width="50px"> STT</td>
                            <td class="title1" width="150px"> Loại Sản Phẩm</td>
                            <td class="title1"width="150px"> Công Ty Sản Phẩm</td>
                            <td class="title1"width="150px"> Tên Sản Phẩm</td>
                            <td class="title1"width="100px"> Số Lượng</td>                            
                        </tr>
                        <?php
						if($data_chitiet==0)
							echo "<tr>
                            		<td class='info1' colspan='5'> Không có chi tiết nào trong phiếu này</td>
								</tr>";
						else{
							$stt=0;
							$hanghoa=new HangHoa;
							foreach($data_chitiet as $item_chitiet){
								$stt++;
								echo"<tr>
										<td class='info1' width='50px'>$stt</td>";								
								$hanghoa->set_idhang($item_chitiet['idHang']);
								$data_hanghoa=$hanghoa->listhanghoa();		
								echo"<td class='info1' width='150px'><input type='text' id='loai$stt' size='30' value='".$data_hanghoa[0][TenLoai]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='congty$stt' size='30' value='".$data_hanghoa[0][TenCongTy]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='150px'><input type='text' id='tensanpham$stt' size='30' value='".$data_hanghoa[0][TenHang]."' disabled='disabled' class='center'/></td>
										<td class='info1' width='100px'><input type='text' name='soluong$stt' size='30' value='$item_chitiet[SoLuong]' disabled='disabled' class='right'/></td>
									 ";
								echo "</tr>";								
							}							
						}?>
						<tr>
                            		<td class='info1' colspan='5'><a href="#" onclick="themdongchitiet('<?php echo ++$stt;?>')" ><input type="button" id="themct" value="Thêm Sản Phẩm" /> </a><input type='submit' name='xoa' value='Xóa Phiếu Nhập'/><input type='submit' name='dong' value='Đóng'/></td>
								</tr>
                    </table>
                    <div id="them"></div>
                    
                
            </fieldset>  
</form>

</body>
</html>
