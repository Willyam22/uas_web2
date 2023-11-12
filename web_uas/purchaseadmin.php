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
                <th scope="col">barang</th>
                <th scope="col">kuantitas</th>
                <th scope="col">total harga</th>
                <th scope="col">gambar</th>
            </tr>
        </thead>
        <tbody id="content">

        </tbody>
    </table>
</body>

<script>
    $(document).ready(function() {


        function display() {
            var tr_str = "";
            $.ajax({
                url: './backend/purchase.php',
                dataType: "JSON",
                type: "GET",
                data: {
                    id: "padmin"
                },
                success: function(response) {
                    console.log(response);
                    $id = response[0].id;
                    for (x in response) {
                        $id = response[x].id;
                        $nama = response[x].nama;
                        $quantitas = response[x].quantitas;
                        $nama_barang = response[x].nama_barang;
                        $price = $quantitas * response[x].price;
                        $pricef = Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format($price);
                        $path = "./img/" + response[x].gambar;
                        tr_str += "<tr>" + "<td >" + $id + "</td>" +
                            "<td >" + $nama + "</td>" +
                            "<td >" + $nama_barang + "</td>" +
                            "<td >" + $quantitas + "</td>" +
                            "<td >" + $pricef + "</td>" +
                            "<td>" + "<img src=" + $path + ">" + "</td>" +
                            "<td >" + "<button type='button' class='btn btn-primary' id='bdel' data-id='" + $id + "'> delete</button>" + "</td>"
                    }

                    $('#content').html(tr_str);
                }
            })
        }


        $(document).on('click', '#bdel', function() {
            $id = $(this).data('id');
            Swal.fire({
                title: 'konfirmasi',
                icon: 'warning',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: './backend/delete.php',
                        type: 'GET',
                        data: {
                            id: $id,
                            page: "puadmin"
                        },
                        success: function(response) {
                            Swal.fire(
                                response
                            )
                            display()
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
</script>

</html>