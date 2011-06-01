<?php
class ChiTietPhieuXuat extends connect_db{
public $idphieuxuat;
public $idhang;
public $soluong;
public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_idhang($idhang){
	$this->idhang=$idhang;
}
public function get_idhang(){
	return $this->idhang;
}
public function set_idphieuxuat($id){
	$this->idphieuxuat=$id;
}
public function get_idphieuxuat(){
	return $this->idphieuxuat;
}
public function set_soluong($soluong){
	$this->soluong=$soluong;
}
public function get_soluong(){
	return $this->soluong;
}
public function insert_chitietphieuxuat(){	
	$sql="insert into chitietphieuxuat(idphieuxuat,idhang,soluong) values('".$this->get_idphieuxuat()."','".$this->get_idhang()."','".$this->get_soluong()."')";
	$this->query($sql);	
}

public function listchitietphieuxuat(){
	if($this->get_idphieuxuat()!="")
		$sql="select * from chitietphieuxuat where idPhieuXuat='".$this->get_idphieuxuat()."'";
	else
		$sql="select * from chitietphieuxuat";
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


public function delete_chitietphieuxuat(){
	$sql="delete from chitietphieuxuat where idPhieuXuat='".$this->get_idphieuxuat()."' and idHang='".$this->get_idhang()."'";	
	$this->query($sql);
}

public function delete_allchitietinphieuxuat(){
	$sql="delete from chitietphieuxuat where idPhieuXuat='".$this->get_idphieuxuat()."' ";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from chitietphieuxuat where idPhieuXuat='".$this->get_idphieuxuat()."' and idHang='".$this->get_idhang()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_chitietphieunhap(){
				
		if($this->get_soluong()!=""){
			$sql="update chitietphieuxuat set SoLuong='".$this->get_soluong()."' where idPhieuXuat='".$this->get_idphieuxuat()."' and idHang='".$this->get_idhang()."'";
			$this->query($sql);	
			return TRUE;	
		}
		return FALSE;
}

}
?>