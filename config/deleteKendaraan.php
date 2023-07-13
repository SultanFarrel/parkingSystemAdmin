<?php
// Koneksi ke database
include("koneksi.php");

// Mendapatkan ID pengguna dari AJAX
$id = $_POST['_id'];

// Menghapus pengguna dari database
$sql = "DELETE FROM kendaraan WHERE id_kendaraan='$id'";
$hasil = mysqli_query($konek, $sql);



if ($hasil === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("Kendaraan Berhasil Dihapus")';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("Kendaraan gagal dihapus. Error: " ' . $sql . '"<br>"' . $konek->error, ')';
    echo '</script>';
}

$konek->close();
