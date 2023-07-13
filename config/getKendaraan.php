<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar pengguna dari database
$no_urut = 0;
$sql = "SELECT * FROM kendaraan";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

//Header Table

echo "<thead>
<tr>
  <th>No</th>
  <th>ID Jenis Kendaraan</th>
  <th>Nama Jenis Kendaraan</th>
  <th>Tarif</th>
  <th class='text-center'>Aksi</th>
</tr>
</thead>";

// Memproses hasil query dan menghasilkan tabel HTML
if ($total > 0) {
    while ($data = mysqli_fetch_array($hasil)) {
        $no_urut++;
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $no_urut . "</td>";
        echo "<td>" . $data["id_kendaraan"] . "</td>";
        echo "<td>" . $data["jenis_kendaraan"] . "</td>";
        echo "<td>" . $data["tarif"] . "</td>";
        echo "<td>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<img src='assets/icon/edit.svg' alt='editIcon' class='icon-edit-vehicle' data-id='" . $data["id_kendaraan"] . "' data-jenis='" . $data["jenis_kendaraan"] . "' data-tarif='" . $data["tarif"] . "'/>|";
        echo "<img src='assets/icon/delete.svg' alt='deleteIcon' class='icon-delete-vehicle' data-id='" . $data["id_kendaraan"] . "'/>";
        echo "</div>";
        echo "</td>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada Kendaraan</td></tr>";
}

$konek->close();
