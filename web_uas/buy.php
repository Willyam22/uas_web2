<?php
session_start();
include './backend/dbcon.php'
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy</title>
    <link rel="stylesheet" href="about.css">
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/326058/pexels-photo-326058.jpeg?cs=srgb&dl=pexels-pixabay-326058.jpg&fm=jpg');
        }
    </style>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="buy.css">
    <link rel="stylesheet" href="footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        div#a {
            background-image: none;
        }
    </style>


</head>

<body>
    <?php
    $id = $_SESSION['id_purchase'];
    $query = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $arr = mysqli_fetch_assoc($result);
    ?>

    <?php
    include 'navbar.php'
    ?>

    <div class="content">
        <div id="a">
            <img src="./img/<?= $arr['gambar'] ?>" alt="">
        </div>

        <div class="desc">
            <h3 style="border-bottom: 2px solid black;"></h3>
            <h2 id="harga" data-id="<?= $arr['price'] ?>"> <sub>/piece</sub></h2>
            <div class="box">
                <p>color </p>
                <div class="color-container">
                    <div class="color" id="red"></div>
                    <div class="color" id="black"></div>
                    <div class="color" id="blue"></div>
                </div>

            </div>
            <p>shipping: express</p>
            <p><?= $arr['deskripsi'] ?></p>
            <p>contact seller: 081222349568 </p>
        </div>
        <h2></h2>
        <div class="add">
            <h3>jumlah </h3>
            <form action="" method="GET" id="formbeli">
                <input type="number" style="width: 150px;" name="kuantitas">
                <button type="button" id="buy" name="buy" data-id="<?= $id  ?>">buy </button>
            </form>

        </div>
    </div>

    <footer style="position: absolute;">@2022 Willyam</footer>

</body>
<script type="text/javascript" src="login.js"></script>
<script>
    $(document).ready(function() {
        var idharga = $('#harga').data("id");
        var price = Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(idharga);
        console.log(price);
        $('#harga').html(price);


        $('#buy').on('click', function() {
            var idsep = $('#buy').data("id");
            console.log(idsep);
            var form = $('#formbeli').serializeArray();

            var formakhir = form[0]['value'];
            if (formakhir === "") {
                formakhir = "1";
            }
            Swal.fire({
                title: 'konfirmasi',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: './backend/buyin.php',
                        data: {
                            id: idsep,
                            quantity: formakhir,
                        },
                        type: "GET",
                        success: function(response) {
                            if (response === "berhasil") {
                                Swal.fire({
                                    title: response,
                                    icon: 'success'
                                })
                            }
                        }
                    })
                }
            })

        })

    })
</script>






</html>