<?php
// Koneksi ke database
include("koneksi.php");

// Mendapatkan ID pengguna dari AJAX
$id = $_POST['_id'];

// Menghapus pengguna dari database
$sql = "DELETE FROM parkir_masuk WHERE kode_parkir='$id'";
$hasil = mysqli_query($konek, $sql);

if ($hasil === TRUE) {
    echo "Data berhasil dihapus";
} else {
    echo "Data gagal dihapus. Error: " . $sql . "<br>" . $konek->error;
}

$konek->close();
