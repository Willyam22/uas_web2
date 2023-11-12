<?php
session_start();
include 'dbcon.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['user'])) {
        $nama = $_SESSION['user'];
        $quantitas = $_GET['quantity'];
        if ($quantitas === 0) {
            $quantitas = 1;
        }
        $barang = $_GET['id'];

        $query = "INSERT INTO transaksi (nama, quantitas, barang) VALUES ('$nama', $quantitas, $barang)";
        $result = mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    } else {
        echo "false";
    }
}
