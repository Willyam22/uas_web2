<?php
include 'dbcon.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_GET['fname'];
    $query = "SELECT * FROM id_pengguna WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['user'] = $user_id;
        $data['email'] = $row['email'];
        $ver = 0;
        for ($i = 0; $i <= 6; $i++) {
            $ver .= rand(1, 9);
        }
        $_SESSION['vcode'] = $ver;
        $data['vcode'] = $ver;
        $data['valid'] = true;
    } else {
        $data['valid'] = false;
    }
    echo json_encode($data);
}
