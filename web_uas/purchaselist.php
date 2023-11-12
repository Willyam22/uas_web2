<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
        var tr_str = "";
        $.ajax({
            url: './backend/purchase.php',
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                if (response.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: `you did not buy any product recently`
                    }).then((result) => {
                        window.location.href = "index.php";
                    })
                } else {
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
                            "<td>" + "<img src=" + $path + ">" + "</td>"
                    }

                    $('#content').html(tr_str);
                }
            }

        })
    })
</script>

</html>