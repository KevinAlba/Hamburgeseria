<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Public/CSS/styles.css">
</head>
<body>
        <!---------------------------------Header------------------------------------>
    <?php include 'View/Header.php'; ?>
    <!---------------------------------Main------------------------------------>
    <?php include $view; ?>

    <!---------------------------------Footer------------------------------------>
<?php include 'View/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>