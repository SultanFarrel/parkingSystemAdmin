<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar parkir keluar dari database
$sql = "SELECT * FROM parkir_keluar ORDER BY tanggal_masuk";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

//Header Table

echo "<thead>
<tr>
  <th>Kode Parkir</th>
  <th>Tanggal / Jam Masuk</th>
  <th>Tanggal / Jam Keluar</th>
  <th>Lama Parkir</th>
  <th>Tarif</th>
  <th>Total Bayar</th>
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
        echo "<td>" . $data["tanggal_masuk"] . "</td>";
        echo "<td>" . $data["tanggal_keluar"] . "</td>";
        echo "<td>" . $data["lama_parkir"] . "</td>";
        echo "<td>" . $data["tarif"] . "</td>";
        echo "<td>" . $data["total_bayar"] . "</td>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada parkir keluar</td></tr>";
}

$konek->close();
