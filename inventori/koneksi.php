<?php 

$dblocal = "localhost";
$dbuser = "root";
$dbpw = "";
$dbname = "inventori";

$koneksi = mysqli_connect($dblocal,$dbuser,$dbpw,$dbname);

 if( $koneksi->connect_error )
 {
 	die( 'Gagal Terhubung Ke Database !! : '. $koneksi->connect_error );
 }

?>