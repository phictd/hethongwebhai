<?php 
function dongcuaso(){
	echo "<script language='javascript'>
	window.close();
	</script>";
}
function locdau($a){
	$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
	"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
	,"ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
	,"ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
	,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
	,"Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ");
	$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
	,"a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o"
	,"o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A"
	,"A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O"
	,"O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D");
$a=str_replace($marTViet,$marKoDau,$a);
return str_replace(" ","",$a);
}

function xulygia($gia){
	if($gia<=999)
		$giakq=$gia." VN&#272;";
	else{
		$t1=substr($gia,-3,4);
		$t2=substr($gia,-6,-3);
		$t3=substr($gia,0,-6);
		if($gia>999999) $giakq=$t3.'.'.$t2.'.'.$t1.' VN&#272;';
		else  $giakq=$t2.'.'.$t1.' VN&#272;';
	}
	
	return $giakq;
}
function tragialai($gia){	
	$t1=substr($gia,-12,3);
	$t2=substr($gia,-16,-13);
	$t3=substr($gia,0,-17);
	if(strlen($gia)>17) $giakq=$t3.$t2.$t1;
	else  $giakq=$t2.$t1;	
	return $giakq;
}

function doc3so($so){ 
	$achu = array ( " không "," một "," hai "," ba "," bốn "," năm "," sáu "," bảy "," tám "," chín " ); 
	$aso = array ( "0","1","2","3","4","5","6","7","8","9" ); 
	$kq = ""; 
	$tram = floor($so/100); 
	// Hàng trăm 
	$chuc = floor(($so/10)%10); 
	// Hàng chục 
	$donvi = floor(($so%10)); 
	// Hàng đơn vị 
	if($tram==0 && $chuc==0 && $donvi==0) 
		$kq = "";    
	if($tram!=0){
		$kq .= $achu[$tram] . " trăm ";
		if (($chuc == 0) && ($donvi != 0)) 
			$kq .= " lẻ ";    
	}    
	if (($chuc != 0) && ($chuc != 1)){           
		$kq .= $achu[$chuc] . " mươi";
		if (($chuc == 0) && ($donvi != 0)) 
			$kq .= " linh ";    
	}    
	if ($chuc == 1) 
		$kq .= " mười ";    
	switch ($donvi){
		case 1: if (($chuc != 0) && ($chuc != 1)){
					$kq .= " mốt ";
				}else{
					$kq .= $achu[$donvi];
				}break;
		case 5:if ($chuc == 0){
					$kq .= $achu[$donvi];
				}else{
					$kq .= " lăm ";
				}break;
		default:if($donvi != 0){
					$kq .= $achu[$donvi];
				}break;
	}

	return $kq;}
function doc_so($so){ 
	$so = preg_replace("([a-zA-Z{!@#$%^&*()_+<>?,.}]*)","",$so); 
	if (strlen($so) <= 21) {
		$kq = "";  
		$c = 0;  
		$d = 0;  
		$tien = array ( "", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ", " tỷ tỷ" );  
		for ($i = 0; $i < strlen($so); $i++){   
			if ($so[$i] == "0")    
				$d++;   
			else break;  
		}
		$so = substr($so,$d);
		for ($i = strlen($so); $i > 0; $i-=3){
			$a[$c] = substr($so, $i, 3);
			$so = substr($so, 0, $i);
			$c++;  
		}  
		$a[$c] = $so;
		for($i = count($a); $i > 0; $i--){
			if (strlen(trim($a[$i])) != 0){
					if (doc3so($a[$i]) != ""){
						if (($tien[$i-1]=="")){
							if (count($a) > 2)
								$kq .= " không trăm lẻ ".doc3so($a[$i]).$tien[$i-1];
							else $kq .= doc3so($a[$i]).$tien[$i-1];
						}else if ((trim(doc3so($a[$i])) == "mười") && ($tien[$i-1]=="")){
								if (count($a) > 2)
									$kq .= " không trăm ".doc3so($a[$i]).$tien[$i-1];
								else 
									$kq .= doc3so($a[$i]).$tien[$i-1];
							}else{
								$kq .= doc3so($a[$i]).$tien[$i-1];
							}
					}   
			}  
		}  
		return $kq." Đồng";
	}else{  
		return "Số quá lớn!"; 
	}
} 


?>