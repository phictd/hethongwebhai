<?php
require("oop.php");
require("xml.php");
echo "<script>";
echo "function tao_xml(){";

$xml = new Xml;
$data = $xml->layhanghoa();

$dom = new DOMDocument("1.0","UTF-8");
$HANGHOA = $dom->createElement('HANGHOA');
$dom->appendChild($HANGHOA);
foreach($data as $row){
	///////////TAO HANG////////////////////
	$Hang = $dom->createElement('HANG');
	$HANGHOA->appendChild($Hang);
	
	/////////////TAO ID HANG/////////////	
	$idHang = $dom->createAttribute('idHang');
	$Hang->appendChild($idHang);
	$vidHang = $dom ->createTextNode($row['idHang']);
	$idHang->appendChild($vidHang);
	
	////////////////////TAO TEN HANG///////////////
	$TenHang = $dom->createElement('TenHang');
	$Hang->appendChild($TenHang);
	echo "<![CDATA[";
	$vTenHang = $dom->createTextNode($row['TenHang']);
	echo "]]>";
	$TenHang->appendChild($vTenHang);
	
	/////////////////TAO GIA HANG////////////
	$Gia = $dom->createElement('Gia');
	$Hang->appendChild($Gia);
	$vGia = $dom->createTextNode($row['Gia']);
	$Gia->appendChild($vGia);
	
	/////////////////TAO HINH/////////////////
	$UrlHinh = $dom->createElement('UrlHinh');
	$Hang->appendChild($UrlHinh);
	echo "<![CDATA[";
	$vUrlHinh = $dom->createTextNode($row['UrlHinh']);
	echo "]]>";
	$UrlHinh->appendChild($vUrlHinh);
	
}
	$dom -> save('hanghoa.xml');
	echo "}";
	echo "</script>";
?>