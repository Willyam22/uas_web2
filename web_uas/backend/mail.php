<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function() {
            emailjs.init("pCUsPABH7gu18tXUm");
        })();
    </script>
</head>

<body>
    <form action="" method="GET" id="fcoba">
        <input type="text" name="coba">
        <button type="button" name="submit" id="submit">masok</button>
    </form>
</body>

<script type="text/javascript">
    function sendMail() {
        var params = {
            name: 'siapa',
            email: 'westlee.412021012@civitas.ukrida.ac.id',
            message: 'coba',

        }
        const serviceID = 'service_l4mk7hn';
        const templateID = 'template_1t7xrst';

        emailjs.send(serviceID, templateID, params).then((res) => {
            console.log(res)
            alert("berhasil")
        })
    }

    $('#submit').on('click', function() {
        sendMail();
    })
</script>

