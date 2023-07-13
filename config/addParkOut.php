<?php
// Koneksi ke database
include("koneksi.php");
date_default_timezone_set("Asia/Bangkok");

// Mendapatkan data pengguna dari AJAX
$kodeParkirAjax = $_POST['_kode'];

// variable tambahan
$tanggalKeluar = date("Y-m-d H:i:s");

// mengambil data dari database
$query = mysqli_query($konek, "SELECT kode_parkir, tanggal as tanggal_masuk, jenis_kendaraan FROM parkir_masuk WHERE kode_parkir = '$kodeParkirAjax'");
$data = mysqli_fetch_array($query);
$tanggalMasuk = $data['tanggal_masuk'];
$jenisKendaraan = $data['jenis_kendaraan'];

// Cek tarif
$queryK = mysqli_query($konek, "SELECT tarif FROM kendaraan WHERE jenis_kendaraan = '$jenisKendaraan'");
$dataK = mysqli_fetch_array($queryK);
$tarif = $dataK['tarif'];

// Cek lama parkir
$waktuMasuk = strtotime($tanggalMasuk);
$waktuKeluar = strtotime($tanggalKeluar);
// menghitung selisih dengan hasil detik
$detik = $waktuKeluar - $waktuMasuk;;
// membagi detik menjadi jam
$jam = floor($detik / (60 * 60));
//membagi detik menjadi jam
$menit = $detik - $jam * (60 * 60);
$menit = floor($menit / 60);
$lamaParkir = ($jam . "." . $menit);

// Cek total bayar
if ($jam < 1) {
    $jam = 1;
}
$total_bayar = $tarif * $jam;

// Cek kode parkir
if ($query->num_rows > 0) {
    $kodeParkir = $kodeParkirAjax;
    // Menambah pengguna baru ke database
    $sql = "INSERT INTO parkir_keluar (kode_parkir, tanggal_masuk, tanggal_keluar, lama_parkir, tarif, total_bayar) VALUES ('$kodeParkir', '$tanggalMasuk', '$tanggalKeluar', '$lamaParkir', '$tarif', $total_bayar)";
    $hasil = mysqli_query($konek, $sql);
} else {
    echo '<script language="javascript">';
    echo 'alert("Kode Parkir Tidak Sesuai")';
    echo '</script>';
}

if ($hasil === TRUE) {
    echo "Parkir keluar ditambahkan.";
} else {
    echo "Parkir keluar gagal ditambahkan. Error: " . $sql . "<br>" . $konek->error;
}

$konek->close();
