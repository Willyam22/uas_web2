<?php
session_start();
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nama = $_SESSION['user'];
    $komentar = $_POST['comment'];
    if ($komentar === "") {
        echo "isi komentar!";
    } else {
        $query = "INSERT INTO komen (nama, komentar) VALUES('$nama', '$komentar')";
        $result = mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn)) {
            echo "berhasil";
        }
    }
}
