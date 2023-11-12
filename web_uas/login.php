<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="card.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/2327ffa4-20e9-41b6-b77c-462d26f7bfea/d3ecbzg-045f95bb-8610-4dbb-84ab-e1d08fb037d7.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function() {
            emailjs.init(/* insert your public key here*/);
        })();
    </script>
</head>

<body>
    <div class="card-container-2 text-center">
        <form method="POST" id="frmlogin">
            <div class="card-login">
                <h3>Login</h3>
                <p>Username
                    <input type="text" id="uname" name="uname" id="uname">
                </p>
                <p>password
                    <input type="password" id="pw" name="pw" id="pw">
                </p>
                <div class="row mt-3">
                    <p class="col text-primary" type="button" id="forg">forgetpassword?</p>
                    <p class="col text-primary" type="button" id="reg">register</p>
                </div>
                <input type="button" name="submit" value="login" id="submit">
            </div>
        </form>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="mshow">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="GET" id="fforg">

                    </form>
                    <p id="err"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cmodal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id="vshow">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">verification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>we are sending verification code to your email</p>
                    <form action="" method="GET" id="vforg">
                        <input type="text" id="unid" name="unid">
                        <button type="button" id="vbutton" name="vbutton">submit</button>
                    </form>
                    <p id="err"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="vmodal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="pshow">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">new password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="GET" id="pforg">
                        <label for="pwp">masukan password</label>
                        <input type="password" id="pwp" name="pwp">
                        <label for="pwp1">masukan password yang sama</label>
                        <input type="password" id="pwp1" name="pwp1">
                        <button type="button" id="pbutton" name="pbutton">submit</button>
                    </form>
                    <p id="err"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="pmodal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>



<script>
    $(document).ready(function() {
        $('#cmodal').on("click", function() {
            $('#mshow').modal('hide');
        })
        $('#cemodal').on("click", function() {
            window.location.href = "./backend/logout.php"
        })
        $('#pmodal').on("click", function() {
            window.location.href = "./backend/logout.php"
        })
        $('#vmodal').on("click", function() {
            window.location.href = "./backend/logout.php"
        })

        $('#submit').on("click", function() {
            $.ajax({
                type: "POST",
                url: "./backend/loginl.php",
                data: $('#frmlogin').serialize(),
                success: function(response) {
                    console.log(response)
                    if (response == "berhasil") {
                        window.location.href = "link.php";
                    } else {
                        document.getElementById("err").innerHTML = response;
                        $('#mshow').modal('show');
                    }
                }
            })
        })

        $(document).on('click', '#forg', function() {
            var f_str = `<div class="form-group">
                            <label for="fname">username</label>
                            <input type="text" class="form-control" id="fname" placeholder="username" name="fname">
                        </div>
                        <button type="button" id="masuk" name="masuk" class="btn btn-primary mt-4">Submit</button>`
            $('#fforg').html(f_str)
            $('#mshow').modal('show')
        })

        $(document).on('click', '#reg', function() {
            window.location.href = "register.php"
        })

        $(document).on('click', '#masuk', function() {
            var x = $('#fforg').serializeArray()
            $.ajax({
                url: './backend/forget.php',
                type: 'GET',
                data: x,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    console.log(response['valid'])
                    if (response['valid'] === true) {
                        var params = {
                            name: 'this is the verification code',
                            email: response['email'],
                            message: response['vcode'],
                        }
                        const serviceID = /*insert your service id here*/ ;
                        const templateID = /*insert your template id here*/;

                        emailjs.send(serviceID, templateID, params).then((res) => {})
                        $('#mshow').modal('hide');
                        $('#vshow').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'user tidak ditemukan'
                        })
                    }
                }
            })
        })


        $(document).on('click', '#vbutton', function() {
            var x = $('#vforg').serializeArray();
            $.ajax({
                url: './backend/email.php',
                type: 'POST',
                data: {
                    vcode: x
                },
                success: function(response) {
                    if (response === "berhasil") {
                        $('#vshow').modal('hide')
                        $('#pshow').modal('show')
                    }
                }
            })
        })

        $(document).on('click', '#pbutton', function() {
            console.log('coba');
            let form = new FormData($('#pforg')[0]);
            console.log(form);
            $.ajax({
                url: './backend/pwforget.php',
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(response) {
                    if (response['valid']) {
                        Swal.fire({
                            icon: 'success',
                            title: 'success'
                        }).then((res) => {
                            window.location.href = "./backend/logout.php"
                        })
                    } else {
                        var err = ""
                        if (response['bpwr']) {
                            err += response['pwr'] + ','
                        }
                        if (response['bpws']) {
                            err += response['pws'] + ','
                        }
                        if (response['bpwe']) {
                            err += response['pwe'] + ','
                        }
                        Swal.fire({
                            icon: 'warning',
                            title: 'error',
                            text: err
                        })
                    }
                }
            })
        })
    })
</script>

</html>