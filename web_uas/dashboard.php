<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <a href="admin.php"><button type="button" class="btn btn-primary">product</button></a>
    <a href="purchaseadmin.php"><button type="button" class="btn btn-primary">purchase</button></a>
    <a href="newsadmin.php"><button type="button" class="btn btn-primary">news</button></a>
    <a href="commentadmin.php"><button type="button" class="btn btn-primary">comment</button></a>
</body>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "../backend/logcheck.php",
            dataType: 'json',
            success: function(response) {
                if (response['type'] !== "admin") {
                    Swal.fire({
                        icon: 'error',
                        title: 'you are not an admin',
                    }).then((result) => {
                        window.location.href = 'index.php'
                    })
                }
            }
        })
    })
</script>

</html>