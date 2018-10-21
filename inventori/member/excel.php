<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor 
header("Content-Disposition: attachment; filename=barang-keluar.xls");
 
// Tambahkan table
include 'barangkeluar.php';
?>