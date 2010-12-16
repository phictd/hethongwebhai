<?php 
class donhang extends connect_db{
    private $idDonHang;
    private $Username;
    private $ThoiDiemDatHang;
    private $ThoiDiemGiaoHang;
    private $TenNguoiNhan;
    private $DienThoai;
    private $DiaDiemGiaoHang;	
	private $TinhTrang;
	private $GhiChu;   
    public function  __construct() {
        $this->connect();
    }   
    public function  __destruct() {
        $this->disconnect();
    }        
    public function set_idDonHang($tt){
        $this->idDonHang = $tt;
    }
    public function get_idDonHang(){
        return $this->idDonHang;
    }
    public function set_Username($tt){
        $this->Username = $tt;
    }
    public function get_Username(){
        return $this->Username;
    }
	public function set_ThoiDiemDatHang($tt){
        $this->ThoiDiemDatHang = $tt;
    }
    public function get_ThoiDiemDatHang(){
        return $this->ThoiDiemDatHang;
    }
	public function set_ThoiDiemGiaoHang($tt){
        $this->ThoiDiemGiaoHang = $tt;
    }
    public function get_ThoiDiemGiaoHang(){
        return $this->ThoiDiemGiaoHang;
    }
	public function set_TenNguoiNhan($tt){
        $this->TenNguoiNhan = $tt;
    }
    public function get_TenNguoiNhan(){
        return $this->TenNguoiNhan;
    }
	public function set_DienThoai($tt){
        $this->DienThoai = $tt;
    }
    public function get_DienThoai(){
        return $this->DienThoai;
    }
	public function set_DiaDiemGiaoHang($tt){
        $this->DiaDiemGiaoHang = $tt;
    }
    public function get_DiaDiemGiaoHang(){
        return $this->DiaDiemGiaoHang;
    }
	public function set_TinhTrang($tt){
        $this->TinhTrang = $tt;
    }
    public function get_TinhTrang(){
        return $this->TinhTrang;
    }
	public function set_GhiChu($tt){
        $this->GhiChu = $tt;
    }
    public function get_GhiChu(){
        return $this->GhiChu;
    }
    public function ThemDonHang(){
        $sql = "insert into donhang(";
		if($this->get_idDonHang()!="")$sql=$sql."idDonHang,";
		if($this->get_Username()!="")$sql=$sql."Username,";
		if($this->get_ThoiDiemDatHang()!="")$sql=$sql."ThoiDiemDatHang,";
		if($this->get_ThoiDiemGiaoHang()!="")$sql=$sql."ThoiDiemGiaoHang,";
		if($this->get_TenNguoiNhan()!="")$sql=$sql."TenNguoiNhan,";
		if($this->get_DienThoai()!="")$sql=$sql."DienThoai,";
		if($this->get_DiaDiemGiaoHang()!="")$sql=$sql."DiaDiemGiaoHang,";
		if($this->get_GhiChu()!="")$sql=$sql."GhiChu,";
		$sql=substr($sql,0,-1);
		$sql=$sql.") values(";
		
		if($this->get_idDonHang()!="")$sql=$sql."'".$this->get_idDonHang()."',";
		if($this->get_Username()!="")$sql=$sql."'".$this->get_Username()."',";
		if($this->get_ThoiDiemDatHang()!="")$sql=$sql."'".$this->get_ThoiDiemDatHang()."',";
		if($this->get_ThoiDiemGiaoHang()!="")$sql=$sql."'".$this->get_ThoiDiemGiaoHang()."',";
		if($this->get_TenNguoiNhan()!="")$sql=$sql."'".$this->get_TenNguoiNhan()."',";
		if($this->get_DienThoai()!="")$sql=$sql."'".$this->get_DienThoai()."',";
		if($this->get_DiaDiemGiaoHang()!="")$sql=$sql."'".$this->get_DiaDiemGiaoHang()."',";
		if($this->get_GhiChu()!="")$sql=$sql."'".$this->get_GhiChu()."',";
		$sql=substr($sql,0,-1);
		$sql=$sql.")";		
		
		
        $this->query($sql);
        
            return TRUE;
        
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