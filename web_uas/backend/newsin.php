<?php
include 'dbcon.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $bool = true;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sumber = $_POST['sumber'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "SELECT gambar FROM berita ";
        $result = mysqli_query($conn, $query);
        $gambar1 = mysqli_fetch_assoc($result);
        $gambarLama =  $gambar1['gambar'];
        if ($_FILES['image']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $path = '../img2/' . $gambarLama;
            unlink($path);
            $gambar = files();
        }

        $query1 = $conn->prepare("UPDATE berita SET title = ?, content = ?, gambar = ? , sumber = ? WHERE id = ? ");
        $query1->bind_param('ssssi', $title, $content, $gambar, $sumber, $id);

        $query1->execute();

        $data['cek'] = mysqli_affected_rows($conn);
        $data['id'] = $_POST['id'];

        if (mysqli_affected_rows($conn) > 0) {
            $data['hasil'] = "berhasil";
        }
        echo json_encode($data);
    } else {
        $image = files();
        if (isset($image['check'])) {
            $data['imagee'] = $image['e'];
            $data['imageb'] = true;
            $bool = false;
        }

        if ($title === "") {
            $data['titlee'] = "harus mengisi title";
            $bool = false;
        }

        if ($content === "") {
            $data['contente'] = "harus mengisi content";
            $bool = false;
        }
        if ($sumber === "") {
            $data['sumbere'] = "sumber harus diisi";
            $bool = false;
        }

        if ($bool) {
            $query = $conn->prepare("INSERT INTO berita (title,content,gambar, sumber) VALUES (?, ?, ?, ?)");
            $query->bind_param('ssss', $title, $content, $image, $sumber);

            $query->execute();


            if (mysqli_affected_rows($conn) > 0) {
                $data['hasil'] = 'berhasil';
            }
            echo json_encode($data);
        } else {
            $data['salah'] = 'false';
            echo json_encode($data);
        }
    }
} else {
    $id = $_GET['id'];
    $query = "SELECT gambar FROM berita WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $path = '../img2/' . $row['gambar'];
    unlink($path);
    $queryd = "DELETE FROM berita WHERE id = '$id'";
    $resultd = mysqli_query($conn, $queryd);
    if (mysqli_affected_rows($conn) > 0) {
        echo "berhasil";
    }
}


function files()
{
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        $array['e'] = "file belum diupload";
        $array['check'] = false;
        return $array;
    }

    $format = 'jpg';
    $eksimage = explode('.', $namaFile);
    $eksimage = strtolower(end($eksimage));

    if ($eksimage !== $format) {
        $array['e'] = "file harus bersifat jpg";
        $array['check'] = false;
        return $array;
    }

    if ($ukuranFile > 2000000) {
        $array['e'] = "ukuran file terlalu besar";
        $array['check'] = false;
        return $array;
    }

    $nfileuid = uniqid();
    $nfileuid .= '.';
    $nfileuid .= $eksimage;

    move_uploaded_file($tmpName, '../img2/' . $nfileuid);
    return $nfileuid;
}
