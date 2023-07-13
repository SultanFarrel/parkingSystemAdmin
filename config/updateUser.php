<?php
// Koneksi ke database
include("koneksi.php");

// Mendapatkan data pengguna dari AJAX
$id = $_POST['_id'];
$name = $_POST['_name'];
$username = $_POST['_username'];
$password = $_POST['_password'];

// Update pengguna dari database
$sql = "UPDATE user SET nama_user='$name', username='$username', password='$password' WHERE id_user='$id'";
$hasil = mysqli_query($konek, $sql);



if ($hasil === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("User Berhasil diubah")';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("User gagal diubah. Error: " ' . $sql . '"<br>"' . $konek->error, ')';
    echo '</script>';
}

$konek->close();
