<?php
/**
 * Created by PhpStorm.
 * User: Rifky_Rep
 * Date: 01/03/2017
 * Time: 13.34
 */
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'akademik_probis';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
    die($exception->getMessage());
}
function tglindo($tgl) {
    $tanggal = substr($tgl,8,2);
    $bulan = substr($tgl,5,2);
    $tahun = substr($tgl,0,4);
    return $tanggal."-".$bulan."-".$tahun;
}