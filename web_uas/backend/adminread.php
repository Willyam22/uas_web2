<?php
include 'dbcon.php';

$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $nama = $row['nama_barang'];
    $price = $row['price'];
    $deskripsi = $row['deskripsi'];
    $gambar = $row['gambar'];


    $rows[] = array("id" => $id, "nama" => $nama, "price" => $price, "deskripsi" => $deskripsi, "gambar" => $gambar);
}

echo json_encode($rows);
exit;
