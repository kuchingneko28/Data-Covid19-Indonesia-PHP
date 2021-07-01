<?php
include "./curl.php";
date_default_timezone_set("Asia/Makassar");
$tanggal_sekarang = date("D-M-Y");

$url = "https://data.covid19.go.id/public/api/prov.json";

$run = getUrl($url);

$result = json_decode($run,true);
foreach ($result['list_data'] as $data)
{
    $print1 = "[+] ". $data['key']. "\n";
    $print2 = "- Update terakhir :  ". $result['last_date']. "\n";
    $print3 = "- Jumlah kasus : ". $data['jumlah_kasus']. "\n";
    $print4 = "- Jumlah sembuh : ". $data['jumlah_sembuh']. "\n";
    $print5 = "- Jumlah meninggal : ". $data['jumlah_meninggal']. "\n";
    $print6 = "- Jumlah dirawat : ". $data['jumlah_dirawat']. "\n";
    $print7 = "[+] Kasus Penambahan\n";
    $print8 = "- Penambahan positif : ". $data['penambahan']['positif']. "\n";
    $print9 = "- Penambahan sembuh : ". $data['penambahan']['sembuh']. "\n";
    $print10 = "- Penambahan meninggal : ". $data['penambahan']['meninggal']. "\n\n";

    $gabung = $print1.$print2.$print3.$print4.$print5.$print6.$print7.$print8.$print9.$print10;
    
    $txt = fopen($tanggal_sekarang.".txt","a");
    fwrite($txt, $gabung);
    fclose($txt);
    echo file_get_contents($tanggal_sekarang.".txt");
    
}