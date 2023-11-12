<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cycling</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="card.css">
    <link rel="stylesheet" href="footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        body {
            background-image: url('https://i.ytimg.com/vi/El4yH1zY2ZI/maxresdefault.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: auto;
        }
    </style>
</head>

<body>

    <?php include 'navbar.php' ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://static.toiimg.com/thumb/msid-83309472,width-1200,height-900,resizemode-4/.jpg" class="d-block w-100" alt="..." style="height: 100% ;">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img src="https://hips.hearstapps.com/hmg-prod/images/trek-madone-7-0252-tested-1669830963.jpg" class="d-block w-100" alt="..." style="height: 100%;">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQW1vwy6DjUGWqr8_HaKQVzYyFcUtbcmUouLQ&usqp=CAU" class="d-block w-100" alt="..." style="height: 100%;">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div> -->
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="abang-mahesa">
        <div class="card-container" id="show">

        </div>
    </div>



    <footer>@2022 Willyam</footer>

    <script>
        $(document).ready(function() {


            $.ajax({
                url: "./backend/adminread.php",
                dataType: "JSON",
                success: function(response) {
                    var tr_str = "";
                    console.log(response);
                    console.log(response[0].gambar);

                    for (x in response) {
                        var price = Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(response[x].price);
                        tr_str += `<div class="card">
                                    <img src="./img/` + response[x].gambar + `" alt="">
                                    <div class="text-container-in">
                                        <p>` + response[x].nama + `</p>
                                        <p>` + price + `</p>

                                    </div>
                                    <button type="button" id="buy" data-id="` + response[x].id + `">Purchase</button>
                                </div>`
                    }
                    $("#show").html(tr_str);

                }
            })

            $(document).on('click', '#buy', function(e) {
                var idsep = $(this).data("id");
                $.ajax({
                    url: './backend/logcheck.php',
                    dataType: 'json',
                    success: function(response) {
                        if (response['err']) {
                            Swal.fire({
                                icon: 'error',
                                title: "you should login first",
                                text: "do you want to login?",
                                showCancelButton: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "login.php"
                                }
                            })
                        } else {
                            $.ajax({
                                url: './backend/buyid.php',
                                type: "GET",
                                data: {
                                    id: idsep
                                },
                                success: function() {
                                    window.location.href = "buy.php";
                                    console.log(response);
                                }
                            })
                        }
                    }
                })

            })


        })
    </script>

</body>
<script type="text/javascript" src="login.js"></script>

</html>