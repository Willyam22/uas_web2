<?php
include 'dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM berita WHERE id = '$id'";
} else {
    $query = "SELECT * FROM berita";
}


$rows = [];

$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);
