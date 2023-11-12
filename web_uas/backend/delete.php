<?php
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    if (isset($_GET['page'])) {
        $id  = $_GET['id'];
        $query = "DELETE FROM transaksi WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    } else if (isset($_GET['comment'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM komen WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            echo "berhasil";
        }
    } else {
        $query1 = "SELECT gambar FROM product WHERE id = '$id'";
        $result1 = mysqli_query($conn, $query1);
        $gambar1 = mysqli_fetch_assoc($result1);
        $path = '../img/' . $gambar1['gambar'];
        unlink($path);

        $query = "DELETE FROM product WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }
}
