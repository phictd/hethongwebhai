<table>
<?php
				require_once('libraries/hanghoa.php');
				$b= new HangHoa;
				$data1=$b->listhanghoa();
				foreach($data1 as $item1){
					echo "<tr>";
					echo "<td><a href='#'>$item1[TenHang] </a></td>";
					echo "<td><img src=$item1[UrlHinh] /></td>";
					echo "</tr>";
				}
				?>
</table>