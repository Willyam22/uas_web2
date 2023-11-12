<?php
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_barang'];
    $price = $_POST['price'];
    $deskripsi = $_POST['desc'];
    $bool = true;
    $gambar;
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "SELECT gambar FROM product WHERE id = '$id' ";
        $result = mysqli_query($conn, $query);
        $gambar1 = mysqli_fetch_assoc($result);
        $gambarLama = $gambar1['gambar'];
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $path = '../img/' . $gambarLama;
            unlink($path);
            $gambar = files();
        }


        $query = "UPDATE product SET nama_barang ='$nama', price ='$price', gambar='$gambar', deskripsi = '$deskripsi' WHERE id = '$id'";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "berhasil";
        }
    } else {
        $gambar = files();
        if (!$gambar) {
            $bool = false;
        }


        if ($nama === "") {
            $bool = false;
        }
        if ($price === "") {
            $bool = false;
        }

        if ($bool) {
            $query = "INSERT INTO product(nama_barang, price, gambar, deskripsi)VALUES ('$nama', '$price', '$gambar', '$deskripsi')";
            mysqli_query($conn, $query);
        }
        if (mysqli_affected_rows($conn) > 0) {
            echo "berhasil";
        }
    }
}

function files()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "file belum diupload";
        return false;
    }

    $format = 'jpg';
    $eksgambar = explode('.', $namaFile);
    $eksgambar = strtolower(end($eksgambar));

    if ($eksgambar !== $format) {
        echo "file harus bersifat jpg";
        return false;
    }

    if ($ukuranFile > 2000000) {
        echo "ukuran file terlalu besar";
        return false;
    }

    $nfileuid = uniqid();
    $nfileuid .= '.';
    $nfileuid .= $eksgambar;

    move_uploaded_file($tmpName, '../img/' . $nfileuid);
    return $nfileuid;
}
