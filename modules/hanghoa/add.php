<?php
	if(isset($_POST['ok'])){
		if($_POST['txtuser'] == NULL){
			$loi[]= ERROR_EMPTY_USER;
		}else{
			$u=$_POST['txtuser'];
		}	
		if($_POST['txtpass'] == NULL){
			$loi[]=ERROR_EMPTY_PASS;
		}else{
			if($_POST['txtpass'] != $_POST['txtpass2']){
				$loi[]=ERROR_NOTMATCHES;
			}else{
				$p=$_POST['txtpass'];
			}
		}
		$l=$_POST['level'];
		if($u && $p && $l){
			$a=new User;
			$a->set_user($u);
			$a->set_pass($p);
			$a->set_level($l);
			if($a->insert_user() == FALSE){
				$loi[]="Sorry, Your username has been register, please try again";
			}else{
				ob_end_clean();
				header("location:index.php?module=user&act=list");
				exit();
			}
		}	
	}
?>
<form action="index.php?module=user&act=add" method="post">
<fieldset>
<legend>Add A User</legend>
<?php
	if($loi != ""){
		echo "<ul>";
		foreach($loi as $err){
			echo "<li>$err</li>";
		}
		echo "</ul>";
	}
?>
<label>Level:</label> <select name="level">
						<option value="1">Member</option>
                        <option value="2">Administrator</option>
						</select><br />
<label>Username:</label> <input type="text" name="txtuser" size="25" /><br />     
<label>Password:</label> <input type="password" name="txtpass" size="25" /><br />  
<label>Re-Password:</label> <input type="password" name="txtpass2" size="25" /><br />      
<label>&nbsp;</label> <input type="submit" name="ok" value="Add A User" />       
</fieldset>        
</form>