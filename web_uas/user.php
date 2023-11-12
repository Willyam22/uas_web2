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
                <th scope="col">nama</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
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
                url: './backend/uread.php',
                dataType: 'json',
                success: function(response) {
                    var tr_str = ""
                    for (x in response) {
                        var nama = response[x].user_id
                        var password = response[x].password
                        var email = response[x].email
                        tr_str +=
                            "<tr>" + "<td >" + nama + "</td>" +
                            "<td >" + email + "</td>" +
                            "<td >" + password + "</td>" +
                            `<td>` + `<button type='button' class='btn btn-primary' id='delete' data-id='` + nama + `'>delete</button>` + "</td>";
                    }
                    $('#content').html(tr_str)
                }
            })
        }

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
                        display()
                    }
                }
            })
        })

    })
</script>

</html>