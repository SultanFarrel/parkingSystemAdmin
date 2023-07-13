<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar pengguna dari database
$sql = "SELECT * FROM parkir_masuk WHERE status='0'";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

$total = 10 - $total;

// Memproses hasil query dan menghasilkan tabel HTML

if ($total > 0) {
    echo "<div class='parking-lot'>
    <h4>Parkir Kosong</h4>
    <p>$total</p>
    </div>";
} else {
    echo "FULL";
}



$konek->close();
