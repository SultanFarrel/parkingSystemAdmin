<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar parkir masuk dari database
$sql = "SELECT parkir_masuk.kode_parkir, parkir_masuk.tanggal, parkir_keluar.tanggal_keluar, parkir_masuk.nomor_plat, parkir_masuk.jenis_kendaraan, parkir_keluar.lama_parkir, parkir_keluar.tarif, parkir_keluar.total_bayar 
        FROM parkir_masuk
        INNER JOIN parkir_keluar
        ON parkir_masuk.kode_parkir = parkir_keluar.kode_parkir";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

//Header Table

echo "<thead>
<tr>
  <th>Kode Parkir</th>
  <th>Tanggal / Jam Masuk</th>
  <th>Tanggal / Jam Keluar</th>
  <th>Nomor Plat</th>
  <th>Jenis Kendaraan</th>
  <th>Lama Parkir</th>
  <th>Tarif</th>
  <th>Total Bayar</th>
</tr>
</thead>";

// Memproses hasil query dan menghasilkan tabel HTML
if ($total > 0) {
    while ($data = mysqli_fetch_array($hasil)) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $data["kode_parkir"] . "</td>";
        echo "<td>" . $data["tanggal"] . "</td>";
        echo "<td>" . $data["tanggal_keluar"] . "</td>";
        echo "<td>" . $data["nomor_plat"] . "</td>";
        echo "<td>" . $data["jenis_kendaraan"] . "</td>";
        echo "<td>" . $data["lama_parkir"] . "</td>";
        echo "<td>" . $data["tarif"] . "</td>";
        echo "<td>" . $data["total_bayar"] . "</td>";
        echo "<td>";
        echo "</td>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada laporan</td></tr>";
}

$konek->close();
