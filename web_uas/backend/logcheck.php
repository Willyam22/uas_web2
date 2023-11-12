<?php
session_start();

if (sizeof($_SESSION) > 0) {
    $data['user'] = $_SESSION['user'];
    if ($_SESSION['type'] == 2) {
        $data['type'] = "user";
    } else if ($_SESSION['type'] == 1) {
        $data['type'] = "admin";
    }
    echo json_encode($data);
    exit();
} else {
    $data['err'] = true;
    echo json_encode($data);
}
