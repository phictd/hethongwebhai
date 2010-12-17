<?php
class PhieuNhap extends connect_db{
public $idphieunhap;
public $ngaynhap;
public $tongtien;
public $ghichu;
public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_ngaynhap($ngaynhap){
	$this->ngaynhap=$ngaynhap;
}
public function get_ngaynhap(){
	return $this->ngaynhap;
}
public function set_idphieunhap($id){
	$this->idphieunhap=$id;
}
public function get_idphieunhap(){
	return $this->idphieunhap;
}
public function set_tongtien($tongtien){
	$this->tongtien=$tongtien;
}
public function get_tongtien(){
	return $this->tongtien;
}
public function set_ghichu($ghichu){
	$this->ghichu=$ghichu;
}
public function get_ghichu(){
	return $this->ghichu;
}

public function insert_phieunhap(){	
	$sql="insert into phieunhap(idPhieuNhap,NgayNhap,TongTien,GhiChu) values('".$this->get_idphieunhap()."','".$this->get_ngaynhap()."','".$this->get_tongtien()."','".$this->get_ghichu()."')";
	$this->query($sql);	
}

public function listphieunhap(){
	$sql="select * from phieunhap";
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


public function delete_phieunhap(){
	$sql="delete from phieunhap where idPhieuNhap='".$this->get_idphieunhap()."'";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from phieunhap where idPhieuNhap='".$this->get_idphieunhap()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_phieunhap(){
		$sql="update phieunhap set ";
		if($this->get_ngaynhap()!="") $sql=$sql."NgayNhap='".$this->get_ngaynhap()."',";
		if($this->get_tongtien()!="")$sql=$sql."TongTien='".$this->get_tongtien()."',";
		if($this->get_ghichu()!="")$sql=$sql."GhiChu='".$this->get_ghichu()."',";
		$sql=substr($sql,0,-1);
		$sql=$sql." where idPhieuNhap='".$this->get_idphieunhap()."'";
		$this->query($sql);			
}

}
?>