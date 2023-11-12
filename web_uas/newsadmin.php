<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .img {
            width: 600px;
            height: 300px
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php'
    ?>
    <button type="button" class="btn btn-primary" id="add_news" name="addnews">add news</button>
    <div class="modal" tabindex="-1" role="dialog" id="mnews">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">insert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="newsin" enctype="multipart/form-data">
                        <input type="hidden" id="uid">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title" class="form-control" id="title">
                            <p style="color: red" id="titlee"></p>
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                            <p id="contente" style="color: red"></p>
                        </div>
                        <div class="form-group">
                            <label for="sumber">sumber</label>
                            <input type="text" name="sumber" class="form-control" id="sumber">
                            <p style="color: red" id="sumbere"></p>
                        </div>
                        <div class="mb-3">
                            <img src="" alt="" id="img"><br>
                            <label for="image" class="form-label">insert image</label>
                            <input class="form-control" name="image" type="file" id="image">
                            <p id="imagee" style="color: red"></p>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="button" name="button">submit</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id='mclose'>Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">sumber</th>
                <th scope="col">gambar</th>
            </tr>
        </thead>
        <tbody id="isi">

        </tbody>
    </table>



</body>

<script>
    $(document).ready(function() {

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
        $('#add_news').on('click', function() {
            $('#mnews').modal('show');
            $('#uid').removeAttr('value');
            $('#uid').removeAttr('name');
            $('#img').removeAttr('src');
        })
        $('#mclose').on('click', function() {
            $('#mnews').modal('hide');
            document.getElementById("newsin").reset();
        })
        $('#button').on('click', function() {
            let x = new FormData($('#newsin')[0]);
            $.ajax({
                url: './backend/newsin.php',
                type: "POST",
                data: x,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    console.log(response["salah"])
                    if (response['hasil'] === 'berhasil') {
                        Swal.fire({
                            icon: 'success',
                            title: response['hasil'],
                        }).then((result) => {
                            display();
                            document.getElementById("newsin").reset();
                            $('#mnews').modal('hide');
                        })
                    } else {
                        if (response['titlee'] == "harus mengisi title") {
                            document.getElementById('titlee').innerHTML = response['titlee'];
                        } else {
                            document.getElementById('titlee').innerHTML = "";
                        }
                        if (response['contente'] == "harus mengisi content") {
                            document.getElementById('contente').innerHTML = response['contente'];
                        } else {
                            document.getElementById('contente').innerHTML = "";
                        }
                        if (response['sumbere'] == "sumber harus diisi") {
                            document.getElementById('sumbere').innerHTML = response['sumbere'];
                        } else {
                            document.getElementById('sumbere').innerHTML = "";
                        }
                        if (response['imageb']) {
                            document.getElementById('imagee').innerHTML = response['imagee'];
                        } else {
                            document.getElementById('imagee').innerHTML = "";
                        }


                    }
                }
            })
        })



        function display() {
            $.ajax({
                url: './backend/newsread.php',
                dataType: 'JSON',
                success: function(response) {
                    var len = response.length;
                    var tr_str = "";

                    for (i in response) {
                        var id = response[i].id
                        var content = response[i].content
                        var title = response[i].title
                        var sumber = response[i].sumber
                        var gambar = response[i].gambar
                        tr_str += "<tr>" + "<td >" + id + "</td>" +
                            "<td >" + title + "</td>" +
                            "<td >" + content + "</td>" +
                            "<td >" + sumber + "</td>" +
                            "<td>" + "<img class='img'src=./img2/" + gambar + ">" + "</td>" +
                            `<td>` + `<button type='button' class='btn btn-primary' id='ubah' data-id='` + id + `'>edit </button>` + "</td>" +
                            `<td>` + `<button type='button' class='btn btn-primary' id='delete' data-id='` + id + `'>delete</button>` + "</td>";
                    }

                    $('#isi').html(tr_str);
                }
            })
        }

        $(document).on('click', '#ubah', function() {
            var idsep = $(this).data('id');
            $.ajax({
                url: './backend/newsread.php',
                data: {
                    id: $(this).data('id')
                },
                type: "GET",
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    $('#mnews').modal('show')
                    $('#content').val(response[0].content)
                    $('#title').val(response[0].title)
                    $('#sumber').val(response[0].sumber);
                    $('#img').attr('src', './img2/' + response[0].gambar)
                    $('#uid').attr('value', idsep);
                    $('#uid').attr('name', "id");
                }
            })
        })

        $(document).on('click', '#delete', function() {
            var iddel = $(this).data('id')

            Swal.fire({
                icon: 'warning',
                title: 'konfirmasi',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: './backend/newsin.php',
                        type: "GET",
                        data: {
                            id: iddel
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: response
                            }).then((result) => {
                                display();
                            })
                        }
                    })
                }

            })

        })

    })
</script>

</html>