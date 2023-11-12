<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include 'navbar.php'
    ?>

    </div>
    <div class="center1 d-flex flex-column mb-3">
        <div class="kotak">
            <div class="text-bout">
                <h1 style="text-align: center;">about me</h1>
                <center><img src="./img/me1.png" alt=""></center>

                <h2 style="text-align: center;">Willyam 412021009
                    <br>saya adalah mahasiswa Ukrida yang menempuh semester 3
                </h2>
                <h2><a href="aboutme.php">more info</a></h2>
            </div>
        </div>
        <div class="box1 text-center mt-5">
            <form action="" method="POST" id="com">
                <div><label for="comment">masukan komentar</label></div>

                <div><textarea name="" id="" cols="30" rows="10"></textarea></div>
                <div><button type="button" name="submit" id="submit">submit</button></div>
                <!-- <input type="text" id="comment" name="comment"> -->

            </form>
        </div>
    </div>

    <footer style="color: black; ">@2022 Willyam</footer>
</body>
<script>
    $(document).ready(function() {
        $('#submit').on('click', function() {
            var x = $('#com').serializeArray();
            $.ajax({
                url: './backend/aboutin.php',
                type: "POST",
                data: x,
                success: function(response) {
                    if (response === "berhasil") {
                        Swal.fire({
                            icon: 'success',
                            title: response,
                        }).then((resulst) => {
                            document.getElementById('com').reset();
                        })
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: response,
                        })
                    }
                }
            })
        })
    })
</script>
<script type="text/javascript" src="login.js"></script>

</html>