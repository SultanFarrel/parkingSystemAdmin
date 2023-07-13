<?php
// Koneksi ke database
include("koneksi.php");
date_default_timezone_set("Asia/Bangkok");

// mengambil data barang dengan kode paling besar
$query = mysqli_query($konek, "SELECT max(kode_parkir) as kodeTerbesar FROM parkir_masuk");
$data = mysqli_fetch_array($query);
$kodeParkir = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeParkir, 2, 4);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%04s", $urutan); berguna untuk membuat string menjadi 4 karakter
// misalnya perintah sprintf("%04s", 115); maka akan menghasilkan '0115'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya US-
$huruf = "P-";
$kodeParkir = $huruf . sprintf("%04s", $urutan);

// Mendapatkan data pengguna dari AJAX
$plat = $_POST['_plat'];
$jenis = $_POST['_jenisKendaraan'];

// variable tambahan
$status = "0";
$tanggal = date("Y-m-d H:i:s");

// Menambah pengguna baru ke database
$sql = "INSERT INTO parkir_masuk (kode_parkir, tanggal, nomor_plat, jenis_kendaraan, status) VALUES ('$kodeParkir', '$tanggal', '$plat', '$jenis', $status)";
$hasil = mysqli_query($konek, $sql);

if ($hasil === TRUE) {
    echo "Parkir masuk ditambahkan.";
} else {
    echo "Parkir masuk gagal ditambahkan. Error: " . $sql . "<br>" . $konek->error;
}

$konek->close();
