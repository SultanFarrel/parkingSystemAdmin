<?php
// Koneksi ke database 
include("koneksi.php");

// Mendapatkan daftar pengguna dari database
$no_urut = 0;
$sql = "SELECT * FROM user";
$hasil = mysqli_query($konek, $sql);
$total = mysqli_num_rows($hasil);

//Header Table

echo "<thead>
<tr>
  <th>No</th>
  <th>ID User</th>
  <th>Nama User</th>
  <th>Username</th>
  <th>Password</th>
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
        echo "<td>" . $data["id_user"] . "</td>";
        echo "<td>" . $data["nama_user"] . "</td>";
        echo "<td>" . $data["username"] . "</td>";
        echo "<td>" . $data["password"] . "</td>";
        echo "<td>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<img src='assets/icon/edit.svg' alt='editIcon' class='icon-edit-user' data-id='" . $data["id_user"] . "'data-name='" . $data["nama_user"] . "' data-username='" . $data["username"] . "' data-password='" . $data["password"] . "'/>|";
        echo "<img src='assets/icon/delete.svg' alt='deleteIcon' class='icon-delete-user' data-id='" . $data["id_user"] . "'/>";
        echo "</div>";
        echo "</td>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada anggota</td></tr>";
}

$konek->close();
