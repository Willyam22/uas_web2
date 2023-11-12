<?php
session_start();
include 'dbcon.php';

$user = $_SESSION['user'];
$query = "UPDATE id_pengguna SET type_id = 1 WHERE user_id = '$user'";
$result = mysqli_query($conn, $query);
if (mysqli_affected_rows($conn) > 0) {
    echo "berhasil";
}
