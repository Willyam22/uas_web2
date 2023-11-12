<?php
session_start();
include 'dbcon.php';

if (isset($_SESSION['user'])) {
    $rows = [];
    $user = $_SESSION['user'];
    $query = "";
    if (isset($_GET['id'])) {
        $query = "SELECT transaksi.id, transaksi.nama, transaksi.quantitas, product.nama_barang, product.price, product.gambar FROM transaksi INNER JOIN product ON transaksi.barang = product.id";
    } else {
        $query = "SELECT transaksi.id, transaksi.nama, transaksi.quantitas, product.nama_barang, product.price, product.gambar FROM transaksi INNER JOIN product ON transaksi.barang = product.id WHERE transaksi.nama = '$user'";
    }
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    echo json_encode($rows);
}
