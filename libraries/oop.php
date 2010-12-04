<?php
class connect_db{
protected $host="localhost";
protected $user_host="root";
protected $pass_host="root";
protected $dbname="project";
protected $conn;
protected $result;
public function connect(){
	$this->conn=mysql_connect($this->host,$this->user_host,$this->pass_host);
	mysql_select_db($this->dbname,$this->conn);
}
public function disconnect(){
	if($this->conn){
		mysql_close($this->conn);
	}
}
public function query($sql){
	$this->result=mysql_query($sql);
}
public function num_rows(){
	if($this->result){
		$row=mysql_num_rows($this->result);
		return $row;
	}else{
		return 0;
	}
}
public function fetch(){
	if($this->result){
		$row=mysql_fetch_assoc($this->result);
		return $row;
	}else{
		return 0;
	}
}

}
/*
$a= new connect_db;
$a->connect();
$a->query("select * from user");
echo $a->num_rows();
while($data=$a->fetch()){
echo "<pre>";
print_r($data);
echo "</pre>";
echo $data[username];
}
*/
