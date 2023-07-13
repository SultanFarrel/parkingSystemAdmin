<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar pengguna dari database
$sql = "SELECT * FROM user";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

// Memproses hasil query dan menghasilkan tabel HTML

echo $total;

$konek->close();
