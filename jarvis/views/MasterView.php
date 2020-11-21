<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php require_once VIEWS_PATH . $view . ".php"; ?>
</body>

</html>