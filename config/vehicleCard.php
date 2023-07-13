<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar pengguna dari database
$no_urut = 0;
$sql = "SELECT * FROM kendaraan";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

// Memproses hasil query dan menghasilkan tabel HTML

echo "<div class='parking-lot'>
  <h4>Jenis Kendaraan</h4>
  <p>$total</p>
</div>";

$konek->close();
