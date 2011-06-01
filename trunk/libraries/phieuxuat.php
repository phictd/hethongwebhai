<?php
class PhieuXuat extends connect_db{
public $idphieuxuat;
public $ngayxuat;
public $no;
public $co;
public $bophan;
public $nguoinhan;
public $diachi;
public $dienthoai;
public $lydoxuat;
public $xuattaikho;
public $tongtien;
public $ghichu;
public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_ngayxuat($ngayxuat){
	$this->ngayxuat=$ngayxuat;
}
public function get_ngayxuat(){
	return $this->ngayxuat;
}
public function set_idphieuxuat($id){
	$this->idphieuxuat=$id;
}
public function get_idphieuxuat(){
	return $this->idphieuxuat;
}
public function set_no($no){
	$this->no=$no;
}
public function get_no(){
	return $this->no;
}
public function set_co($co){
	$this->co=$co;
}
public function get_co(){
	return $this->co;
}
public function set_bophan($bophan){
	$this->bophan=$bophan;
}
public function get_bophan(){
	return $this->bophan;
}
public function set_nguoinhan($nguoinhan){
	$this->nguoinhan=$nguoinhan;
}
public function get_nguoinhan(){
	return $this->nguoinhan;
}
public function set_diachi($diachi){
	$this->diachi=$diachi;
}
public function get_diachi(){
	return $this->diachi;
}
public function set_dienthoai($dienthoai){
	$this->dienthoai=$dienthoai;
}
public function get_dienthoai(){
	return $this->dienthoai;
}
public function set_lydoxuat($lydoxuat){
	$this->lydoxuat=$lydoxuat;
}
public function get_lydoxuat(){
	return $this->lydoxuat;
}
public function set_xuattaikho($xuattaikho){
	$this->xuattaikho=$xuattaikho;
}
public function get_xuattaikho(){
	return $this->xuattaikho;
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

public function insert_phieuxuat(){	
	$sql="insert into phieuxuat(idPhieuXuat,NgayXuat,BoPhan,";
	if($this->get_no()!="") $sql.="No,";
	if($this->get_co()!="") $sql.="Co,";
	if($this->get_nguoinhan()!="") $sql.="NguoiNhan,";
	if($this->get_diachi()!="") $sql.="DiaChi,";
	if($this->get_dienthoai()!="") $sql.="DienThoai,";
	if($this->get_lydoxuat()!="") $sql.="LyDoXuat,";
	if($this->get_ghichu()!="") $sql.="GhiChu,";
	$sql.="XuatTaiKho,TongTien) values('".$this->get_idphieuxuat()."','".$this->get_ngayxuat()."','".$this->get_bophan()."',";
	if($this->get_no()!="") $sql.="'".$this->get_no()."',";
	if($this->get_co()!="") $sql.="'".$this->get_co()."',";
	if($this->get_nguoinhan()!="") $sql.="'".$this->get_nguoinhan()."',";
	if($this->get_diachi()!="") $sql.="'".$this->get_diachi()."',";
	if($this->get_dienthoai()!="") $sql.="'".$this->get_dienthoai()."',";
	if($this->get_lydoxuat()!="")$sql.="'".$this->get_lydoxuat()."',";
	if($this->get_ghichu()!="") $sql.="'".$this->get_ghichu()."',";
	$sql.="'".$this->get_xuattaikho()."','".$this->get_tongtien()."')";
	$this->query($sql);	
}

public function listphieuxuat(){
	$sql="select * from phieuxuat";
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


public function delete_phieuxuat(){
	$sql="delete from phieuxuat where idPhieuXuat='".$this->get_idphieuxuat()."'";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from phieuxuat where idPhieuXuat='".$this->get_idphieuxuat()."'";
	$this->query($sql);
	return $this->fetch();
}


}
?>