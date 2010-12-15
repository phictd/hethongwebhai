<?php
class User extends connect_db{
public $username;
public $password;
public $level;
public $hoten;
public $diachi;
public $dienthoai;
public $email;
public $ngaydangky;
public $ngaysinh;
public $gioitinh;

public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	

public function set_user($u){
	$this->username=$u;
}
public function get_user(){
	return $this->username;
}

public function set_pass($p){
	$this->password=$p;
}
public function get_pass(){
	return $this->password;
}

public function set_level($lv){
	$this->level=$lv;
}	

public function get_level(){
	return $this->level;
}

public function set_hoten($p){
	$this->hoten=$p;
}
public function get_hoten(){
	return $this->hoten;
}

public function set_diachi($p){
	$this->diachi=$p;
}
public function get_diachi(){
	return $this->diachi;
}

public function set_dienthoai($p){
	$this->dienthoai=$p;
}
public function get_dienthoai(){
	return $this->dienthoai;
}

public function set_email($p){
	$this->email=$p;
}
public function get_email(){
	return $this->email;
}

public function set_ngaydangky($p){
	$this->ngaydangky=$p;
}
public function get_ngaydangky(){
	return $this->ngaydangky;
}

public function set_ngaysinh($p){
	$this->ngaysinh=$p;
}
public function get_ngaysinh(){
	return $this->ngaysinh;
}

public function set_gioitinh($p){
	$this->gioitinh=$p;
}
public function get_gioitinh(){
	return $this->gioitinh;
}

public function insert_user(){
	if($this->check_user() == TRUE){
	$sql="insert into user(Username,Password,Level,HoTen,DiaChi,DienThoai,Email,NgayDangKy,NgaySinh,GioiTinh) values('".$this->get_user()."','".$this->get_pass()."','".$this->get_level()."','".$this->get_hoten()."','".$this->get_diachi()."','".$this->get_dienthoai()."','".$this->get_email()."','".$this->get_ngaydangky()."','".$this->get_ngaysinh()."','".$this->get_gioitinh()."')";
	$this->query($sql);
	return TRUE;
	}else{
		return FALSE;
	}
}

public function check_user(){
	$sql="select * from users where Username='".$this->get_user();
	$this->query($sql);
	if($this->num_rows() == 1){
		return FALSE;
	}else{
		return TRUE;
	}
}


public function check_login(){
	$sql="select * from users where Username='".$this->get_user()."' and Password = '".$this->get_pass()."'";
	$this->query($sql);
	if($this->num_rows() == 0){
		return FALSE;
	}else{
		while($row=$this->fetch()){
			$data[]=$row;
		}	
		return $data;
	}
}

public function listuser(){
	$sql="select * from users";
	$this->query($sql);
	if($this->num_rows() == 0){
		return 0;
	}else{
		while($row=$this->fetch()){
			$data[]=$row;
		}	
		return $data;
	}
}

public function listlv($id){
	if($id== 0){
		$sql="select * from users";
	}else{
		$sql="select * from users where level='$id'";
	}
	$this->query($sql);
	if($this->num_rows() == 0){
		return 0;
	}else{
		while($row=$this->fetch()){
			$data[]=$row;
		}	
		return $data;
	}
}

public function delete_user(){
	$sql="delete from users where Username='".$this->get_user()."' and Username != 'admin'";
	$this->query($sql);
}

public function getdata(){
	$sql="select * from users where Username='".$this->get_user()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_lv(){
	$sql="update users set Level='".$this->get_level()."' where Username='".$this->get_user()."'";		
	$this->query($sql);
}

public function update_chitiet(){
	$sql="update users set Password='".$this->get_pass()."', Level='".$this->get_level()."' where Username='".$this->get_user()."'";		
	$this->query($sql);	
}


}