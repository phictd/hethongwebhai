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
public $idloai;
public $tim;
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
/* */
public function set_idloai($idloai){
	$this->idloai=$idloai;
}
public function get_idloai(){
	return $this->idloai;
}
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
	$tam=date("Y-m-d",$ngaycapnhat);
	$this->ngaycapnhat=$tam;
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

public function set_tim($i){
	$this->tim=$i;
}
public function get_tim(){
	return $this->tim;
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
public function insert_hanghoatruoc(){
	if($this->check_hanghoa() == TRUE){
	$sql="insert into hanghoa(idCongTy,TenHang,NgayCapNhat,Gia) values('".$this->get_idcongty()."', '".$this->get_tenhang()."', '".$this->get_ngaycapnhat()."', '".$this->get_gia()."')";
	$this->query($sql);
	return TRUE;
	}
	return FALSE;
}



public function check_hanghoa(){
	if($this->get_tenhang() !="" && $this->get_idcongty()!=""&&$this->get_gia()!=""){
			$sql="select * from hanghoa where TenHang='".$this->get_tenhang()."' and Gia='".$this->get_gia()."'  and idCongTy='".$this->get_idcongty()."'";
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
	if($this->get_idhang()!="")	
		$sql="select * from hanghoa,congty,loaihang where hanghoa.idCongTy=congty.idCongTy and loaihang.idLoaiHang=congty.idLoaiHang and hanghoa.idHang='".$this->get_idhang()."' ";
	else	
		$sql="select * from hanghoa,congty where hanghoa.idCongTy=congty.idCongTy order by idLoaiHang ASC ";
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

public function listhanghoatheoloai($X,$A){
		$sql="select * from hanghoa ,congty,loaihang where hanghoa.idCongTy=congty.idCongTy and loaihang.idLoaiHang=congty.idLoaiHang and loaihang.idLoaiHang='".$this->get_idloai()."' limit $X,$A ";
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
	$sql="select * from hanghoa,congty where hanghoa.idCongTy=congty.idCongTy order by idLoaiHang ASC limit $X,$A";
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


public function dem1(){
$sql="select * from hanghoa ,congty,loaihang where hanghoa.idCongTy=congty.idCongTy and loaihang.idLoaiHang=congty.idLoaiHang and loaihang.idLoaiHang='".$this->get_idloai()."' ";
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


public function delete_hanghoa(){
	$sql="delete from hanghoa where idHang='".$this->get_idhang()."'";	
	$this->query($sql);
}

public function getdata(){
	$sql="select * from hanghoa where idHang='".$this->get_idhang()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_hanghoa(){
	if($this->check_hanghoa() == TRUE){
		$sql="update hanghoa set idCongTy='".$this->get_idcongty()."',TenHang='".$this->get_tenhang()."',Gia='".$this->get_gia()."' where idHang='".$this->get_idhang()."'";
		$this->query($sql);
		return TRUE;
	}else{
		return FALSE;
	}
}


public function tim(){
	$sql="select * from hanghoa where hanghoa.TenHang or hang.Gia LIKE '%".$this->get_tim()."%' ";
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


public function update_chitiet(){
	if($this->get_idhang()!=""){
		if($this->get_urlhinh()!="" && $this->get_mota()!=""){	
			$sql="update hanghoa set UrlHinh='".$this->get_urlhinh()."', MoTa='".$this->get_mota()."' where idHang='".$this->get_idhang()."'";
			$this->query($sql);			
		}else{
			if($this->get_urlhinh()!=""){
				$sql="update hanghoa set UrlHinh='".$this->get_urlhinh()."' where idHang='".$this->get_idhang()."'";
				$this->query($sql);				
			}else{
				if(	$this->get_mota()!=""){
					$sql="update hanghoa set MoTa='".$this->get_mota()."' where idHang='".$this->get_idhang()."'";
					$this->query($sql);	
				}
			}
		}
		return TRUE;
	}
	return FALSE;
	
}

}


?>