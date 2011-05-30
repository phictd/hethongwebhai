<?php
class Xml extends connect_db{

	public function __construct(){
		$this->connect();
	}
	public function __destruct(){
		$this->disconnect();
	}	
	
	public function layhanghoa(){
		$sql="select idHang,TenHang,Gia,UrlHinh from hanghoa";
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

}


?>