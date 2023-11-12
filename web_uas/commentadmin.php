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
    include 'navbar.php'
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">nama</th>
                <th scope="col">isi</th>
            </tr>
        </thead>
        <tbody id="content">

        </tbody>
    </table>
</body>

<script>
    $(document).ready(function() {
        function display() {
            $.ajax({
                url: './backend/commentr.php',
                dataType: 'json',
                success: function(response) {
                    var tr_str = ""
                    for (x in response) {
                        var id = response[x].id
                        var nama = response[x].nama
                        var komentar = response[x].komentar
                        tr_str +=
                            "<tr>" + "<td >" + id + "</td>" +
                            "<td >" + nama + "</td>" +
                            "<td >" + komentar + "</td>" +
                            `<td>` + `<button type='button' class='btn btn-primary' id='delete' data-id='` + id + `'>delete</button>` + "</td>";
                    }
                    $('#content').html(tr_str)
                }
            })
        }

        $(document).on('click', '#delete', function() {
            var x = $(this).data('id')
            Swal.fire({
                icon: 'warning',
                title: 'konfirmasi',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: './backend/delete.php',
                        data: {
                            id: x,
                            comment: true
                        },
                        type: "GET",
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
</script>

</html>