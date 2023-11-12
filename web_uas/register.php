<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reg.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
</head>

<body>
    <div style="display:flex;flex-direction:column">
        <section class="vh-100 bg-image">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                    <form method="POST" id="frmreg" action="./backend/reg.php">
                                        <div class="form-outline mb-4">
                                            <p style="color:red" id="namae"></p>
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="nama" />
                                            <label class="form-label" for="form3Example1cg">Your Name</label>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <p style="color:red" id="emaile"></p>
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                                            <label class="form-label" for="form3Example3cg">Your Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <p style="color:red" id="pwe"></p>
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="pw" />
                                            <label class="form-label" for="form3Example4cg">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <p style="color:red" id="pwe1"></p>
                                            <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="pw1" />
                                            <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                            <label class="form-check-label" for="form2Example3g">
                                                I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="button" id="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal" tabindex="-1" role="dialog" id="modalshow">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalt">berhasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="modalb"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id='cls'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $booln = true;
            $boolm = true;

            $('#submit').on('click', function() {
                empty();
                console.log($('#frmreg').serialize())
                $.ajax({
                    type: "POST",
                    url: "./backend/reg.php",
                    data: $('#frmreg').serialize(),
                    // contentType: false,
                    // processData: false,
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        if (response.acc === "id berhasil di buat") {
                            document.getElementById("modalb").innerHTML = response['acc'];
                            $('#modalshow').modal('show');
                            $('#cls').on('click', function() {
                                window.location.href = "login.php";
                            })
                        } else {
                            console.log($booln)
                            console.log($boolm)
                            if (response.namae === "nama tidak boleh kosong") {
                                $booln = false;
                                $boolm = false;
                                document.getElementById('namae').innerHTML = response["namae"];
                            }
                            if (response.emaile === "email tidak boleh kosong") {
                                document.getElementById('emaile').innerHTML = response["emaile"];
                                $booln = false;
                                $boolm = false;
                            }
                            if (response.pwe === "password tidak boleh kosong") {
                                document.getElementById('pwe').innerHTML = response["pwe"];
                                document.getElementById('pwe1').innerHTML = response["pwe"];
                                $booln = false;
                                $boolm = false;
                            } else if (response['bpwr'] === true) {
                                document.getElementById('pwe').innerHTML = response["pwr"];
                                document.getElementById('pwe1').innerHTML = response["pwr"];
                                $booln = false;
                                $boolm = false;
                            } else if (response['bpws']) {
                                document.getElementById('modalb').innerHTML = response['pws'];
                                document.getElementById('modalt').innerHTML = "gagal";
                                $booln = false;
                                $boolm = false;
                                $('#modalshow').modal('show');
                                $('#cls').on('click', function() {
                                    $('#modalshow').modal('hide');
                                })
                            }
                            if (response.namas === "id telah terbuat") {
                                document.getElementById('modalb').innerHTML = response['namas'];
                                document.getElementById('modalt').innerHTML = "gagal";
                                $('#modalshow').modal('show');
                                $('#cls').on('click', function() {
                                    $('#modalshow').modal('hide');
                                })
                            } else if (response.mails === "email telah terpakai") {
                                document.getElementById('modalb').innerHTML = response['mails'];
                                document.getElementById('modalt').innerHTML = "gagal";
                                $('#modalshow').modal('show');
                                $('#cls').on('click', function() {
                                    $('#modalshow').modal('hide');
                                })
                            }
                        }
                    }
                })
            })
        })

        function empty() {
            document.getElementById('namae').innerHTML = "";
            document.getElementById('emaile').innerHTML = "";
            document.getElementById('pwe').innerHTML = "";
            document.getElementById('pwe1').innerHTML = "";
        }
    </script>
    //
</body>

</html>