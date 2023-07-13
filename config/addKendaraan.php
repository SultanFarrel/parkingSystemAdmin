<?php
// Koneksi ke database
include("koneksi.php");

// mengambil data barang dengan kode paling besar
$query = mysqli_query($konek, "SELECT max(id_kendaraan) as idTerbesar FROM kendaraan");
$data = mysqli_fetch_array($query);
$idKendaraan = $data['idTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($idKendaraan, 3, 4);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%04s", $urutan); berguna untuk membuat string menjadi 4 karakter
// misalnya perintah sprintf("%04s", 115); maka akan menghasilkan '0115'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya US-
$huruf = "JK-";
$idKendaraan = $huruf . sprintf("%04s", $urutan);

// Mendapatkan data pengguna dari AJAX
$jenis = $_POST['_jenisKendaraan'];
$tarif = $_POST['_tarif'];

// Menambah kendaraan baru ke database
$sql = "INSERT INTO kendaraan (id_kendaraan, jenis_kendaraan, tarif) VALUES ('$idKendaraan', '$jenis', '$tarif')";
$hasil = mysqli_query($konek, $sql);

if ($hasil === TRUE) {
    echo "Kendaraan baru ditambahkan.";
} else {
    echo "Kendaraan gagal ditambahkan. Error: " . $sql . "<br>" . $konek->error;
}

$konek->close();
