<?php
session_start();
include 'dbcon.php';
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $id = $_GET['id'];
    $_SESSION['id_purchase'] = $id;

    // $query = "SELECT * FROM product WHERE id = '$id'";
    // $result = mysqli_query($conn, $query);
    // $rows = [];

    // while ($row = mysqli_fetch_assoc($result)) {
    //     $rows[] = $row;
    // }
    // echo json_encode($rows);
}
