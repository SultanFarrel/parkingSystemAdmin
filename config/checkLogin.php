<?php
// Koneksi ke database
include("koneksi.php");

// Mendapatkan data pengguna dari AJAX
$cekUser = null;
$cekPass = null;
$username = $_POST['_username'];
$password = $_POST['_password'];

$sql = "SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "'";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

if ($total > 0) {
    while ($data = mysqli_fetch_array($hasil)) {
        $cekUser = $data['username'];
        $cekPass = $data['password'];
    }
    if ($cekUser == null && $cekPass == null) {
        echo "Login Gagal";
    } else {
        echo "Login Berhasil";
    }
}
