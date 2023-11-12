<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['vcode'][0]['value'] === $_SESSION['vcode']) {
        echo "berhasil";
    } else {
        echo "gagal";
    }
}
