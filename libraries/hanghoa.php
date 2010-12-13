<?php
class HangHoa extends connect_db{
public $idhang;
private $ma;
public $tenhang;
public $idcongty;
public $mota;
public $ngaycapnhat;
public $gia;
public $urlhinh;
public $solanxem;
public $soluong;
public $ghichu;
public $solanmua;
public $anhien;
public $tid;

public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_tenhang($tenhang){
	$this->tenhang=$tenhang;
}
public function get_tenhang(){
	return $this->tenhang;
}

public function set_MaHang($mahang){
            $this->ma = $mahang;
}      
public function get_MaHang(){
   return $this->ma;
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
/* */

public function set_idcongty($idcongty){
	$this->idcongty=$idcongty;
}
public function get_idcongty(){
	return $this->idcongty;
}
public function set_mota($mota){
	$this->mota=$mota;
}
public function get_mota(){
	return $this->mota;
}
public function set_ngaycapnhat($ngaycapnhat){
	$this->ngaycapnhat=$ngaycapnhat;
}
public function get_ngaycapnhat(){
	return $this->ngaycapnhat;
}
public function set_gia($gia){
	$this->gia=$gia;
}
public function get_gia(){
	return $this->gia;
}
public function set_urlhinh($urlhinh){
	$this->urlhinh=$urlhinh;
}
public function get_urlhinh(){
	return $this->urlhinh;
}
public function set_solanxem($solanxem){
	$this->solanxem=$solanxem;
}
public function get_solanxem(){
	return $this->solanxem;
}
public function set_soluong($soluong){
	$this->soluong=$soluong;
}
public function get_soluong(){
	return $this->soluong;
}
public function set_ghichu($ghichu){
	$this->ghichu=$ghichu;
}
public function get_ghichu(){
	return $this->ghichu;
}
public function set_solanmua($solanmua){
	$this->solanmua=$solanmua;
}
public function get_solanmua(){
	return $this->solanmua;
}
public function set_anhien($anhien){
	$this->anhien=$anhien;
}
public function get_anhien(){
	return $this->anhien;
}
/* */
public function insert_hanghoa(){
	if($this->check_hanghoa() == TRUE){
	$sql="insert into hanghoa(TenHang,idCongTy,MoTa,NgayCapNhat,Gia,UrlHinh,SoLanXem,SoLuong,GhiChu,SoLanMua,AnHien) values('".$this->get_tenhang()."', '".$this->get_idcongty()."', '".$this->get_mota()."', '".$this->get_ngaycapnhat()."', '".$this->get_gia()."', '".$this->get_urlhinh()."', '".$this->set_solanxem()."', '".$this->get_soluong()."', '".$this->get_ghichu()."', '".$this->get_solanmua()."', '".$this->get_anhien()."')";
	$this->query($sql);
	return TRUE;
	}else{
		return FALSE;
	}
}

public function check_hanghoa(){
	if($this->get_tenhang() !="" && $this->get_idhang()!="" && $this->get_idcongty()!=""){
			$sql="select * from hanghoa where TenHang='".$this->get_tenhang()."' and idHang='".$this->get_idhang()."' and idCongTy='".$this->get_idcongty()."'";
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
	$sql="select * from hanghoa ";
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
public function listhanghoa6($X,$A){
	$sql="select * from hanghoa limit $X,$A";
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

public function dem(){
$sql="select * from hanghoa";
	$this->query($sql);
	return $this->num_rows();
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

//lay 1 mat hang
       public function getHang(){
        $sql = "select * from hanghoa where idHang ='".$this->get_MaHang()."'";
        $this->query($sql);
        return $this->fetch();
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