<?php
include 'dbcon.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $pw = $_POST['pwp'];
    $pw1 = $_POST['pwp1'];
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

    $bool = true;

    if ($pw === "" || $pw1 === "") {
        $data['pwe'] = "password harus diisi";
        $data['bpwe'] = true;
    }

    if (!preg_match($password_regex, $pw)) {
        $data['pwr'] = "password harus minimal mengandung 8 character 1 huruf besar 1 huruf kecil 1 angka dan 1 special character";
        $data['bpwr'] = true;
        $bool = False;
    }

    if ($pw != $pw1) {
        $data['pws'] = "password harus sama";
        $data['bpws'] = true;
    }

    if ($bool) {
        $user = $_SESSION['user'];
        $hash = password_hash(
            $pw,
            PASSWORD_DEFAULT
        );
        $query = "UPDATE id_pengguna SET password = '$hash' WHERE user_id = '$user'";
        $result = mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            $data['valid'] = true;
        }
    }

    echo json_encode($data);
}
