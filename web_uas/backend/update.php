<?php
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $nama = $row['nama_barang'];
        $price = $row['price'];
        $gambar = $row['gambar'];
        $deskripsi = $row['deskripsi'];

        $rows[] = array("id" => $id, "nama" => $nama, "price" => $price, "deskripsi" => $deskripsi, "gambar" => $gambar);
    }
    echo json_encode($rows);
    exit();
}
