<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../styles/bootstrap/css/bootstrap.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        width: 100%;
    }
</style>

<body>
    <?php require_once TEMPLATES_PATH . "HeaderTemplate.php"; ?>
    <?php require_once VIEWS_PATH . $view . '.php'; ?>




    <script src="../styles/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>