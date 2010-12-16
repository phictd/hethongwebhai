<?php 
class ChiTietDonHang extends connect_db{
    private $idDonHang;
    private $idHang;
    private $SoLuong;
 
    public function  __construct() {
        $this->connect();
    }   
    public function  __destruct() {
        $this->disconnect();
    }        
    public function set_idDonHang($i){
        $this->idDonHang = $i;
    }
    public function get_idDonHang(){
        return $this->idDonHang;
    }
    public function set_idHang($ic){
        $this->idHang = $ic;
    }
    public function get_idHang(){
        return $this->idHang;
    }
	public function set_SoLuong($l){
        $this->SoLuong = $l;
    }
    public function get_SoLuong(){
        return $this->SoLuong;
    }
    public function ThemChiTietDonHang(){
        $sql = "insert into chitietdonhang(";
		if($this->get_idDonHang()!="")$sql=$sql."idDonHang,";
		if($this->get_idHang()!="")$sql=$sql."idHang,";
		if($this->get_SoLuong()!="")$sql=$sql."SoLuong,";
		$sql=substr($sql,0,-1);
		$sql=$sql.") values(";
		
		if($this->get_idDonHang()!="")$sql=$sql."'".$this->get_idDonHang()."',";
		if($this->get_idHang()!="")$sql=$sql."'".$this->get_idHang()."',";
		if($this->get_SoLuong()!="")$sql=$sql."'".$this->get_SoLuong()."',";
		$sql=substr($sql,0,-1);
		$sql=$sql.")";		
        $this->query($sql);
		return $sql;
    }
    //xoa
    public function XoaChitietDonHang(){
        echo "ham xoa don hang";
        $sql = "delete from chitietdonhang where madh ='".$this->getMadh()."'";
        $this->query($sql);
        $sql2 = "delete from donhang where madh ='".$this->getMadh()."'";
        $this->query($sql2);
    }
    //list
    public function listChiTietDonhang(){
        $sql = "select * from donhang";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            while($dong = $this->fetch()){
                $data[] = $dong;
            }
            return $data;
        }
       }
       //get 1 don hang
       public function XemChiTietDonHang(){
	$sql="select * from donhang,chitietdonhang where donhang.madh = chitietdonhang.madh and donhang.madh='".$this->getMadh()."'";
	$this->query($sql);
        echo $sql;
	return $this->fetch();
}
}
?>
