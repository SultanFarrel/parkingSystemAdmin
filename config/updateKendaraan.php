<?php
// Koneksi ke database
include("koneksi.php");

// Mendapatkan data pengguna dari AJAX
$id = $_POST['_id'];
$jenis = $_POST['_jenis'];
$tarif = $_POST['_tarif'];

// Update pengguna dari database
$sql = "UPDATE kendaraan SET jenis_kendaraan='$jenis', tarif='$tarif' WHERE id_kendaraan='$id'";
$hasil = mysqli_query($konek, $sql);



if ($hasil === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("Kendaraan Berhasil diubah")';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("Kendaraan gagal diubah. Error: " ' . $sql . '"<br>"' . $konek->error, ')';
    echo '</script>';
}

$konek->close();
