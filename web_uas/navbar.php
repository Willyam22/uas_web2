<head>
    <link rel="stylesheet" href="navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<div class="navbar-container">
    <div class="kiri">
        <img src="" alt="" id="imguser" style="display: none;">
        <a href="#">
            <p id="un"></p>
        </a>
    </div>
    <div class="navlink">
        <ul id="dsh">
            <a href="index.php">
                <li>Cycling</li>
            </a>

            <a href="voucher.php">
                <li>discount</li>
            </a>

            <a href="news.php">
                <li>news</li>
            </a>
            <a href="aboutus.php">
                <li>AboutUs</li>
            </a>
        </ul>
    </div>
    <div class="kanan" id="kanan">
        <a href="login.php" id="lg" onclick="log1()">
            Login
        </a>
    </div>

</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "./backend/logcheck.php",
            dataType: "JSON",
            success: function(response) {
                console.log(response)
                if (response['err']) {
                    
                } else {
                    var nav_str = `
                        <div class="btn-group">
                        <button type="button" class=" text-dark btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ` + response['user'] + `
                        </button>
                        <div class="dropdown-menu" id='dd'>
                            <a class="dropdown-item text-dark" href="purchaselist.php">purchase list</a>
                            <a class="dropdown-item text-dark" href="./backend/logout.php">log out</a>
                        </div>
                        </div>`;
                    $('#kanan').html(nav_str);
                    ds_str = ""
                    if (response['type'] == "admin") {
                        ds_str = `<a href="dashboard.php">
                            <li>DASHBOARD</li>
                            </a>`

                        $('#dsh').append(ds_str);
                    } else {
                        var s_str = `<p class=" dropdown-item text-dark " type="button" id="promote">promote</p>`
                        $('#dd').append(s_str);
                    }
                }

            }
        })

        $(document).on('click', '#promote', function() {
            Swal.fire({
                icon: 'warning',
                title: 'promote',
                text: 'you want to be promoted?',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: './backend/promote.php',
                        success: function(response) {
                            if (response === 'berhasil') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'success'
                                }).then((res) => {
                                    window.location.href = "./backend/logout.php"
                                })
                            }
                        }
                    })
                }
            })
        })
    })
</script>