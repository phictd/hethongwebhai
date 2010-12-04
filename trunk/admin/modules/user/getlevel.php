	<table align="center"  width="350" >
    	<tr>
        	<td class=title>STT</td>
        	<td class=title>Username</td>
        	<td class=title>Level</td>
        	<td class=title>Edit</td>
        	<td class=title>Del</td>                                                
        </tr>
<?php
	$id=$_GET['id'];
	require("../../libraries/oop.php");
	require("../../libraries/user.php");
	$a= new User;
	$data=$a->listlv($id);
	$stt=0;
	foreach($data as $item){
		$stt++;
		echo "<tr>";
		echo "<td align=center>$stt</td>";
		echo "<td align=center>$item[username]</td>";
		if($item[level] == 1){
			echo "<td align=center>Member</td>";
		}else{
			echo "<td align=center><font color=red>Admin</font></td>";
		}
		echo "<td align=center><a href=index.php?module=news&act=edit&uid=$item[id]>Edit</a></td>";
		echo "<td align=center><a href=index.php?module=news&act=del&uid=$item[id]>Del</a></td>";
		echo "</tr>";
	}

?>
    </table>
