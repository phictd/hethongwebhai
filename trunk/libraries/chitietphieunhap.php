<?php
class ChiTietPhieuNhap extends connect_db{
public $idphieunhap;
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
public function set_idphieunhap($id){
	$this->idphieunhap=$id;
}
public function get_idphieunhap(){
	return $this->idphieunhap;
}
public function set_soluong($soluong){
	$this->soluong=$soluong;
}
public function get_soluong(){
	return $this->soluong;
}
public function insert_chitietphieunhap(){	
	$sql="insert into chitietphieunhap(idphieunhap,idhang,soluong) values('".$this->get_idphieunhap()."','".$this->get_idhang()."','".$this->get_soluong()."')";
	$this->query($sql);	
	
	$sql_phieunhap="update phieunhap set TongTien = TongTien+(".$this->get_soluong()."*(select Gia from hanghoa where idHang='".$this->get_idhang()."')) where idPhieuNhap='".$this->get_idphieunhap()."'";
	$this->query($sql_phieunhap);
	
	$sql_hanghoa="update hanghoa set SoLuong ='".$this->get_soluong()."' where idHang='".$this->get_idhang()."'";
	$this->query($sql_hanghoa);
	

}

public function listchitietphieunhap(){
	if($this->get_idphieunhap()!="")
		$sql="select * from chitietphieunhap where idPhieuNhap='".$this->get_idphieunhap()."'";
	else
		$sql="select * from chitietphieunhap";
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


public function delete_chitietphieunhap(){
	$sql="delete from chitietphieunhap where idPhieuNhap='".$this->get_idphieunhap()."' and idHang='".$this->get_idhang()."'";	
	$this->query($sql);
}

public function delete_allchitietinphieunhap(){
	$sql="delete from chitietphieunhap where idPhieuNhap='".$this->get_idphieunhap()."' ";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from chitietphieunhap where idPhieuNhap='".$this->get_idphieunhap()."' and idHang='".$this->get_idhang()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_chitietphieunhap(){
				
		if($this->get_soluong()!=""){
			$sql="update chitietphieunhap set SoLuong='".$this->get_soluong()."' where idPhieuNhap='".$this->get_idphieunhap()."' and idHang='".$this->get_idhang()."'";
			$this->query($sql);	
			return TRUE;	
		}
		return FALSE;
}

}
?>