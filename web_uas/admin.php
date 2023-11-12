<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <button type="button" class="btn btn-primary" id="add_data">add data</button>

    <div class="modal" tabindex="-1" role="dialog" id="minsert">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./backend/inadmin.php" enctype="multipart/form-data" id="inid">
                        <input type="hidden" id="uid">
                        <div class="form-group">
                            <label for="name_barang">Nama barang</label>
                            <input name="nama_barang" type="text" class="form-control" id="name_barang" aria-describedby="emailHelp" placeholder="Nama barang">

                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input name="price" type="text" class="form-control" id="price" placeholder="Harga">
                        </div>

                        <div class="form-group">
                            <label for="desc">desc</label>
                            <input name="desc" type="text" class="form-control" id="desc" placeholder="deskripsi">
                        </div>

                        <div class="mb-3">
                            <img src="" alt="" id="image"> <br>
                            <label for="formFile">masukan gambar</label>
                            <input name="gambar" class="form-control" type="file" id="formFile">
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="button" name="submit" class="btn btn-primary" id='insertid'>insert</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="mclose">Close</button>
                </div>

            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">nama</th>
                <th scope="col">price</th>
                <th scope="col">description</th>
                <th scope="col">gambar</th>
            </tr>
        </thead>
        <tbody id="content">

        </tbody>
    </table>
</body>

<script>
    $(document).ready(function() {


        $("#add_data").on('click', function() {
            $("#minsert").modal("show");
        });

        $("#mclose").on('click', function() {
            $("#minsert").modal("hide");
            $('#uid').removeAttr('value');
            $('#uid').removeAttr('name');
            document.getElementById("inid").reset();
            $('#image').removeAttr('src');

            display();
        })




        function display() {
            $.ajax({
                url: './backend/adminread.php',
                dataType: 'JSON',
                success: function(response) {
                    var len = response.length;
                    var tr_str = "";


                    for (var i = 0; i < len; i++) {
                        var id = response[i].id;
                        var nama = response[i].nama;
                        // var price = response[i].price;
                        var price = Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(response[i].price);
                        var gambar = response[i].gambar;
                        var desc = response[i].deskripsi;
                        tr_str += "<tr>" + "<td >" + id + "</td>" +
                            "<td >" + nama + "</td>" +
                            "<td >" + price + "</td>" +
                            "<td >" + desc + "</td>" +
                            "<td>" + "<img src=./img/" + gambar + ">" + "</td>" +
                            `<td>` + `<button type='button' class='btn btn-primary' id='ubah' data-id='` + id + `'>edit </button>` + "</td>" +
                            `<td>` + `<button type='button' class='btn btn-primary' id='delete' data-id='` + id + `'>delete</button>` + "</td>";
                    }
                    $('#content').html(tr_str);
                }
            })
        }

        $('#insertid').on('click', function() {
            let form = new FormData($('#inid')[0]);
            $.ajax({
                url: './backend/inadmin.php',
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(response) {
                    $("#minsert").modal('hide');
                    Swal.fire(response).then((result) => {
                        $('#uid').removeAttr('value');
                        $('#uid').removeAttr('name');
                        $('#image').removeAttr('src');
                        display();
                    })
                }
            })
            document.getElementById("inid").reset();
            display();
        })
        $(document).on('click', '#ubah', function(e) {
            var coba = $(this).data("id");
            $.ajax({
                url: "./backend/update.php",
                type: "GET",
                data: {
                    id: coba
                },
                dataType: 'JSON',
                success: function(response) {
                    console.log(response)
                    $('#name_barang').val(response[0].nama);
                    $('#price').val(response[0].price);
                    $('#desc').val(response[0].deskripsi);
                    $('#image').attr('src', './img/' + response[0].gambar)
                    $('#minsert').modal('show');
                    $('#uid').attr('value', coba);
                    $('#uid').attr('name', "id");
                }
            })
        })

        $(document).on('click', '#delete', function(e) {
            var iddel = $(this).data("id");
            Swal.fire({
                title: 'apakah anda yakin ingin mengahapus product ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "./backend/delete.php",
                        type: "GET",
                        data: {
                            id: iddel
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    display();
                                }
                            })

                        }

                    })
                }
            })

        })
        $(document).ready(function() {
            $.ajax({
                url: './backend/logcheck.php',
                dataType: 'json',
                success: function(response) {
                    if (response['type'] !== "admin") {
                        Swal.fire({
                            icon: 'error',
                            title: 'you are not an admin',
                        }).then((result) => {
                            window.location.href = 'index.php'
                        })
                    } else {
                        display();
                    }
                }
            })
        })


    })
</script>

</html>