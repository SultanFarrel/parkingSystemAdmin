<?php
// Koneksi ke database
include("koneksi.php");

// mengambil data barang dengan kode paling besar
$query = mysqli_query($konek, "SELECT max(id_user) as idTerbesar FROM user");
$data = mysqli_fetch_array($query);
$idUser = $data['idTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($idUser, 3, 4);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%04s", $urutan); berguna untuk membuat string menjadi 4 karakter
// misalnya perintah sprintf("%04s", 115); maka akan menghasilkan '0115'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya US-
$huruf = "US-";
$idUser = $huruf . sprintf("%04s", $urutan);

// Mendapatkan data pengguna dari AJAX
$nama = $_POST['_nama'];
$username = $_POST['_username'];
$password = $_POST['_password'];

// Menambah pengguna baru ke database
$sql = "INSERT INTO user (id_user, nama_user, username, password) VALUES ('$idUser', '$nama', '$username', '$password')";
$hasil = mysqli_query($konek, $sql);

if ($hasil === TRUE) {
    echo "Anggota baru ditambahkan.";
} else {
    echo "Anggota gagal ditambahkan. Error: " . $sql . "<br>" . $konek->error;
}

$konek->close();
