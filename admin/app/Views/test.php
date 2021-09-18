<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Text -->
    <h1>Message: <span id="message"></span></h1>

    <!-- Script -->
    <script>
        $(document).ready(function() {

            setInterval(function() {

                fetch('<?= base_url('test/notifications') ?>', {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    body: {
                        message: '1'
                    }
                }).then(response => {
                    return response.json();
                }).then(data => {
                    $('#message').text(JSON.parse(data).message);
                    // console.log();
                }).catch(error => {
                    console.log(error);
                });

            }, 1000);

        });
    </script>

</body>

</html>