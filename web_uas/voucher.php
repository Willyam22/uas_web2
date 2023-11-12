<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>voucher</title>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="card.css">
        <link rel="stylesheet" href="footer.css">
        <style>
            body {
                background-image: url('https://static.vecteezy.com/system/resources/previews/001/594/267/original/red-christmas-background-free-vector.jpg');
            }
        </style>

    </head>

    <body>
        <?php
        include 'navbar.php'
        ?>


        <div class="center">
            <div class="text-container"><img src="https://cdn-icons-png.flaticon.com/512/61/61521.png" alt="">
                <div class="center1">
                    insert voucher
                </div>
                <div class="center1">
                    <input type="text" id="tcher">
                </div>
                <div class="center1">
                    <button id="pencet" onclick="valid()">submit</button>
                </div>
            </div>

        </div>

        <div class="abang-mahesa">
            <div class="card-container-1">
                <div class="card-voucher">
                    <img src="img/disscount.png" alt="" style="height:40px ; width: 60px;">
                    <div class="text-voucher">
                        <p style="border-bottom: 2px solid black; text-align: center;">winter sale</p>
                        <p>discount 30%</p>
                    </div>

                </div>
                <div class="card-voucher">
                    <img src="img/disscount.png" alt="" style="height:40px ; width: 60px;">
                    <div class="text-voucher">
                        <p style="border-bottom: 2px solid black; text-align: center;">12-12</p>
                        <p>discount 10%</p>
                    </div>

                </div>
                <div class="card-voucher">
                    <img src="img/disscount.png" alt="" style="height:40px ; width: 60px;">
                    <div class="text-voucher">
                        <p style="border-bottom: 2px solid black; text-align: center;">winter sale</p>
                        <p>discount 30%</p>
                    </div>

                </div>
                <div class="card-voucher">
                    <img src="img/disscount.png" alt="" style="height:40px ; width: 60px;">
                    <div class="text-voucher">
                        <p style="border-bottom: 2px solid black; text-align: center;">winter sale</p>
                        <p>discount 30%</p>
                    </div>

                </div>
                <div class="card-voucher">
                    <img src="img/disscount.png" alt="" style="height:40px ; width: 60px;">
                    <div class="text-voucher">
                        <p style="border-bottom: 2px solid black; text-align: center;">chirstmas</p>
                        <p>discount 20%</p>
                    </div>

                </div>
                <div class="card-voucher">
                    <img src="img/disscount.png" alt="" style="height:40px ; width: 60px;">
                    <div class="text-voucher">
                        <p style="border-bottom: 2px solid black; text-align: center;">12-12</p>
                        <p>discount 10%</p>
                    </div>

                </div>

            </div>

        </div>
        <footer style="margin-top: 85px;">@2022 Willyam</footer>



    </body>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="validation.js"></script>


</php>