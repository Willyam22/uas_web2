<?php
session_start();
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $bool = true;
    $user = $_POST['uname'];
    $pw = $_POST['pw'];

    if ($user == "" || $pw == "") {
        echo "user atau password tidak boleh kosong";
        $bool = false;
    }

    if ($bool) {
        $result = mysqli_query($conn, "SELECT user_id, password, type_id FROM id_pengguna WHERE user_id = '$user'");

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pw, $row['password'])) {
                $_SESSION['type'] = $row['type_id'];
                $_SESSION['user'] = $row['user_id'];
                echo "berhasil";
            } else {
                echo "password salah";
            }
        } else {
            echo "member tidak ada";
        }
    }
}
