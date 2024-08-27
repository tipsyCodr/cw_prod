<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

</body>
<script>
    swal("Email Verified", "Your email has been successfully verified!", "success");
    setTimeout(function(){
        window.location.href = "<?php echo base_url();?>";
    }, 2000);
</script>

</html>