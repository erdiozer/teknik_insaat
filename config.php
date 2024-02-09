<?php 
ob_start();
session_start();

$host="localhost";
$veritabani_ismi="teknik_insaat";
$kullanici_adi="root";
$sifre="";

try{
    $db = new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
}catch(PDOException $e){
    echo "Veritabanı bağlantısı başarısız oldu";
    echo $e->getMessage();
    exit;
}

$sorgu = $db->prepare("SELECT * FROM ayarlar WHERE id=1");
$sorgu->execute();
$ayarcek = $sorgu->fetch(PDO::FETCH_ASSOC);

// print_r($ayarcek);
?>