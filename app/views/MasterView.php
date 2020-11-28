<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./app/public/app.css">
    <style>
        body {
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php require_once $views_path . $view . ".php"; ?>
</body>

</html>