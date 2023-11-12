<?php
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bool = TRUE;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $pw1 = $_POST['pw1'];
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $response = [];
    $query1 = "SELECT * FROM id_pengguna WHERE user_id = '$nama' ";
    $result1 = mysqli_query($conn, $query1);
    $query2 = "SELECT * FROM id_pengguna WHERE email = '$email'";
    $result2 = mysqli_query($conn, $query2);
    $data['bpwr'] = false;
    $data['bpws'] = false;
    $data['bn'] = false;
    if (mysqli_num_rows($result1) === 1) {
        $data['namas'] = "id telah terbuat";
        $bool = False;
    }
    if (mysqli_num_rows($result2) === 1) {
        $data['mails'] = "email telah terpakai";
        $bool = false;
    }

    if ($nama == "") {
        $data["namae"] = "nama tidak boleh kosong";
        $bool = False;
        $data['bn'] = true;
    }
    if ($email == "") {
        $data["emaile"] = "email tidak boleh kosong";
        $bool = False;
    }
    if ($pw == "" || $pw1 == "") {
        $data['pwe'] = "password tidak boleh kosong";
        $bool = False;
    }
    if ($pw != $pw1) {
        $data['pws'] = "password tidak sama";
        $data['bpws'] = true;
        $bool = False;
    }
    if (!preg_match($password_regex, $pw)) {
        $data['pwr'] = "password harus minimal mengandung 8 character 1 huruf besar 1 huruf kecil 1 angka dan 1 special character";
        $data['bpwr'] = true;
        $bool = False;
    }

    $data['bool'] = $bool;

    if ($bool) {
        $reponse['coba'] = 'coba';
        $pwv = password_hash($pw, PASSWORD_DEFAULT);
        $query = "INSERT INTO id_pengguna VALUES ('$nama','$pwv','$email',2)";
        $result = mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            $response['acc'] = 'id berhasil di buat';
        } else {
            $response['acc'] = 'id gagal di buat';
        }
    } else {
        $response = $data;
    }
    echo json_encode($response);
}
