<?php 
session_start();
create_image(); 
exit(); 

function create_image() 
{ 

    $md5_hash = md5(rand(0,999)); 
    $security_code = substr($md5_hash, 15, 5); 
    $_SESSION["security_code"] = $security_code;
 
    $image = imagecreatefromjpeg("../../images/icons/img.jpg");
	imageline($image,1,1,40,40,$LineColor);
	$LineColor = imagecolorallocate($image,233,239,239);
	imageline($image,1,100,60,0,$LineColor);
    $white = imagecolorallocate($image, 255, 255, 255); 
    //$black = imagecolorallocate($image, 0, 0, 0); 
    //ImageFill($image, 0, 0, $black); 
    imagestring($image, 5, 15, 5, $security_code, $white); 
    header("Content-Type: image/jpeg"); 
    imagejpeg($image); 
    imagedestroy($image);
} 
?>