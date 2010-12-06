<?php
class HangHoa extends connect_db{
public $idtenhang;
public $tenhang;
public $tid;
public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_tenhang($tenhang){
	$this->username=$tenloai;
}
public function get_tenhang(){
	return $this->tenhang;
}
public function set_idhang($idhang){
	$this->idhang=$idhang;
}
public function get_idhang(){
	return $this->idhang;
}
public function set_tid($tid){
	$this->tid=$tid;
}
public function get_tid(){
	return $this->tid;
}

public function insert_hanghoa(){
	if($this->check_hanghoa() == TRUE){
	$sql="insert into hanghoa(TenHang) values('".$this->get_tenhang()."')";
	$this->query($sql);
	return TRUE;
	}else{
		return FALSE;
	}
}

public function check_hanghoa(){
	if($this->get_tenhang() != ""){
			$sql="select * from hanghoa where TenHang='".$this->get_tenhang()."'";
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

public function listhanghoa(){
	$sql="select * from hanghoa";
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

public function listloaihang(){
	$sql="select * from loaihang where idLoaiHang='".$this->get_idloai()."'";	
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

public function delete_hanghoa(){
	$sql="delete from hanghoa where idHangHoa='".$this->get_idhang()."'";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from hanghoa where idHangHoa='".$this->get_idhang()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_hanghoa(){
	if($this->check_hanghoa() == TRUE){
		$sql="update hanghoa set TenHang='".$this->get_tenhang()."' where idHangHoa='".$this->get_idhang()."'";
		$this->query($sql);
		return TRUE;
	}else{
		return FALSE;
	}
}

}
?>