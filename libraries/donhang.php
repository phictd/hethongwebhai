<?php
class donhang extends connect_db{
    private $madh;
    Private $hoten;
    private $sodt;
    private $diachi;
    private $ngaydat;
    private $thanhtien;
    //
    public function  __construct() {
        $this->connect();
    }
    //
    public function  __destruct() {
        $this->disconnect();
    }
        //
    public function setThanhTien($tt){
        $this->thanhtien = $tt;
    }
    //
    public function getThanhTien(){
        return $this->thanhtien;
    }
    //
    public function setMadh($ma){
        $this->madh = $ma;
    }
    //
    public function getMadh(){
        return $this->madh;
    }
    //
    public function setHoTen($ten){
        $this->hoten = $ten;
    }
    //
    public function getHoTen(){
        return $this->hoten;
    }
        //
    public function setDiaChi($dc){
        $this->diachi = $dc;
    }
    //
    public function getDiaChi(){
        return $this->diachi;
    }
    //
    public function setSoDT($so){
        $this->sodt = $so;
    }
    //
    public function getSoDT(){
        return $this->sodt;
    }
    //
    public function setNgayDat($ngay){
        $this->ngaydat = $ngay;
    }
    //
    public function getNgayDat(){
        return $this->ngaydat;
    }
    //them
    public function ThemDonHang(){
        $sql = "insert into donhang values('".$this->getMadh()."','".$this->getHoTen()."','".
        $this->getSoDT()."','".$this->getDiaChi()."','".$this->getNgayDat()."','".$this->getThanhTien()."')";
        $this->query($sql);
        if(mysql_errno () !=""){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    //xoa
    public function XoaDonHang(){
        echo "ham xoa don hang";
        $sql = "delete from chitietdonhang where madh ='".$this->getMadh()."'";
        $this->query($sql);
        $sql2 = "delete from donhang where madh ='".$this->getMadh()."'";
        $this->query($sql2);
    }
    //list
    public function listDonhang(){
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
       public function XemChiTiet(){
	$sql="select * from donhang,chitietdonhang where donhang.madh = chitietdonhang.madh and donhang.madh='".$this->getMadh()."'";
	$this->query($sql);
        echo $sql;
	return $this->fetch();
}
}
?>
