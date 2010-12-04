<?php
class CongTy extends connect_db{
public $idcongty;
public $tencongty;
public $idloaihang;
public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_tencongty($tencongty){
	$this->username=$tencongty;
}
public function get_tencongty(){
	return $this->tencongty;
}
public function set_idcongty($idcongty){
	$this->idloai=$idcongty;
}
public function get_idcongty(){
	return $this->idcongty;
}
public function set_idloaihang($idloaihang){
	$this->tid=$idloaihang;
}
public function get_idloaihang(){
	return $this->idloaihang;
}

public function insert_congty(){
	if($this->check_congty() == TRUE){
	$sql="insert into congty(TenCongTy,idLoaiHang) values('".$this->get_tencongty()."','".$this->get_idloaihang()."')";
	$this->query($sql);
	return TRUE;
	}else{
		return FALSE;
	}
}

public function check_congty(){
	if($this->get_tencongty() != ""&&$this->get_idloaihang()!=""){
			$sql="select * from congty where TenCongTy='".$this->get_tencongty()."' and idLoaiHang='".$this->get_idloaihang()."'";
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

public function listcongty(){
	$sql="select * from congty";
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

public function delete_congty(){
	$sql="delete from congty where idCongTy='".$this->get_idcongty()."'";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from congty where idCongTy='".$this->get_idcongty()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_congty(){
	if($this->check_congty() == TRUE){
		$sql="update congty set TenCongTy='".$this->get_tencongty()."',idLoaiHang='".$this->get_idloaihang()."' where idCongTy='".$this->get_idcongty()."'";
		$this->query($sql);
		return TRUE;
	}else{
		return FALSE;
	}
}

}
?>