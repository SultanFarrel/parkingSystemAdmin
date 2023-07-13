<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar parkir masuk dari database
$sql = "SELECT * FROM parkir_masuk ORDER BY tanggal";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

//Header Table

echo "<thead>
<tr>
  <th>Kode Parkir</th>
  <th>Tanggal / Jam</th>
  <th>Nomor Plat</th>
  <th>Jenis Kendaraan</th>
  <th>Status</th>
  <th class='text-center'>Aksi</th>
</tr>
</thead>";

// Memproses hasil query dan menghasilkan tabel HTML
if ($total > 0) {
    while ($data = mysqli_fetch_array($hasil)) {
        if ($data["status"] == 0) {
            $status = "Masuk";
        } else {
            $status = "Keluar";
        }
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $data["kode_parkir"] . "</td>";
        echo "<td>" . $data["tanggal"] . "</td>";
        echo "<td>" . $data["nomor_plat"] . "</td>";
        echo "<td>" . $data["jenis_kendaraan"] . "</td>";
        echo "<td>" . $status . "</td>";
        echo "<td>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<img src='assets/icon/delete.svg' alt='deleteIcon' class='icon-delete-parkIn' data-id='" . $data["kode_parkir"] . "'/>";
        echo "</div>";
        echo "</td>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada parkir masuk</td></tr>";
}

$konek->close();
