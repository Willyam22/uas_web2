<?php
include 'dbcon.php';
$id = $_GET['id'];

$query = "SELECT * FROM berita WHERE id = '$id'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

echo json_encode($row);
