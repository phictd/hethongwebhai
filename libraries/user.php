<?php
class User extends connect_db{
public $username;
public $password;
public $level;
public $uid;
public function __construct(){
	$this->connect();
}
public function __destruct(){
	$this->disconnect();
}	
public function set_user($u){
	$this->username=$u;
}
public function get_user(){
	return $this->username;
}
public function set_pass($p){
	$this->password=$p;
}

public function get_pass(){
	return $this->password;
}

public function set_level($lv){
	$this->level=$lv;
}	

public function get_level(){
	return $this->level;
}

public function set_id($id){
	$this->uid=$id;
}

public function get_id(){
	return $this->uid;
}


public function insert_user(){
	if($this->check_user() == TRUE){
	$sql="insert into user(username,password,level) values('".$this->get_user()."','".$this->get_pass()."','".$this->get_level()."')";
	$this->query($sql);
	return TRUE;
	}else{
		return FALSE;
	}
}

public function check_login(){
	$sql="select * from users where Username='".$this->get_user()."' and Password = '".$this->get_pass()."'";
	$this->query($sql);
	if($this->num_rows() == 0){
		return FALSE;
	}else{
		while($row=$this->fetch()){
			$data[]=$row;
		}	
		return $data;
	}
}

public function listuser(){
	$sql="select * from users";
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

public function listlv($id){
	if($id== 0){
		$sql="select * from user";
	}else{
		$sql="select * from user where level='$id'";
	}
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

public function delete_user(){
	$sql="delete from user where id='".$this->get_id()."' and id != '1'";
	$this->query($sql);
}

public function getdata(){
	$sql="select * from user where id='".$this->get_id()."'";
	$this->query($sql);
	return $this->fetch();
}

public function update_user(){
	if($this->check_user() == TRUE){
		if($this->get_pass() != "none"){
			$sql="update user set username='".$this->get_user()."', password='".$this->get_pass()."', level='".$this->get_level()."' where id='".$this->get_id()."'";
		}else{
			$sql="update user set username='".$this->get_user()."', level='".$this->get_level()."' where id='".$this->get_id()."'";	
		}
		$this->query($sql);
		return TRUE;
	}else{
		return FALSE;
	}
}

}