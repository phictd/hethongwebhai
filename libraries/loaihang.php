<?php
class LoaiHang extends connect_db{
public $idloai;
public $tenloai;
public $tid;
public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_tenloai($tenloai){
	$this->tenloai=$tenloai;
}
public function get_tenloai(){
	return $this->tenloai;
}
public function set_idloai($idloai){
	$this->idloai=$idloai;
}
public function get_idloai(){
	return $this->idloai;
}
public function set_tid($tid){
	$this->tid=$tid;
}
public function get_tid(){
	return $this->tid;
}

public function insert_loaihang(){
	if($this->check_loaihang() == TRUE){
	$sql="insert into loaihang(TenLoai) values('".$this->get_tenloai()."')";
	$this->query($sql);
	return TRUE;
	}else{
		return FALSE;
	}
}

public function check_loaihang(){
	if($this->get_tenloai() != ""){
			$sql="select * from loaihang where TenLoai='".$this->get_tenloai()."'";
	}else{
		return FALSE;
	}
	$this->query($sql);
	if($this->num_rows() == 1){
		return FALSE;
	}else{
		return TRUE;
	}
}

public function listloaihang(){
	$sql="select * from loaihang";
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

public function listcongty(){
	$sql="select * from congty where idLoaiHang='".$this->get_idloai()."'";	
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

public function delete_loaihang(){
	$sql="delete from loaihang where idLoaiHang='".$this->get_idloai()."'";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from loaihang where idLoaiHang='".$this->get_idloai()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_loaihang(){
	if($this->check_loaihang() == TRUE){
		$sql="update loaihang set TenLoai='".$this->get_tenloai()."' where idLoaiHang='".$this->get_idloai()."'";
		$this->query($sql);
		return TRUE;
	}else{
		return FALSE;
	}
}

}
?>