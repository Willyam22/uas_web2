<?php
include 'dbcon.php';

$query = "SELECT * FROM id_pengguna WHERE type_id= 2";
$result = mysqli_query($conn, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
echo json_encode($rows);
