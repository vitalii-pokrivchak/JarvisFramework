<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../styles/bootstrap/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="../styles/css/carousel.css" rel="stylesheet">
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

    *:hover,
    *:focus,
    *:active {
        outline: none;
        box-shadow: none !important;
        -webkit-appearance: none;
    }

    input[type='search']::-webkit-search-decoration,
    input[type='search']::-webkit-search-cancel-button,
    input[type='search']::-webkit-search-results-button,
    input[type='search']::-webkit-search-results-decoration {
        display: none;
    }
</style>


<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<style>
    ._3emE9--dark-theme .-S-tR--ff-downloader {
        background: rgba(30, 30, 30, .93);
        border: 1px solid rgba(82, 82, 82, .54);
        box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
        color: #fff
    }

    ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
        background: #3d4b52
    }

    ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
        background: #131415
    }

    ._3emE9--dark-theme .-S-tR--ff-downloader ._10vpG--footer {
        background: rgba(30, 30, 30, .93)
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader {
        background: #fff;
        border: 1px solid rgba(82, 82, 82, .54);
        box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
        color: #314c75
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader ._6_Mtt--header {
        font-weight: 700
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
        border: 0;
        color: rgba(0, 0, 0, .88)
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader ._10vpG--footer {
        background: #fff
    }

    .-S-tR--ff-downloader {
        display: block;
        overflow: hidden;
        position: fixed;
        bottom: 20px;
        right: 7.1%;
        width: 330px;
        height: 180px;
        background: rgba(30, 30, 30, .93);
        border-radius: 2px;
        color: #fff;
        z-index: 99999999;
        border: 1px solid rgba(82, 82, 82, .54);
        box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
        transition: .5s
    }

    .-S-tR--ff-downloader._3M7UQ--minimize {
        height: 62px
    }

    .-S-tR--ff-downloader._3M7UQ--minimize .nxuu4--file-info,
    .-S-tR--ff-downloader._3M7UQ--minimize ._6_Mtt--header {
        display: none
    }

    .-S-tR--ff-downloader ._6_Mtt--header {
        padding: 10px;
        font-size: 17px;
        font-family: sans-serif
    }

    .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
        float: right;
        background: #f1ecec;
        height: 20px;
        width: 20px;
        text-align: center;
        padding: 2px;
        margin-top: -10px;
        cursor: pointer
    }

    .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
        background: #e2dede
    }

    .-S-tR--ff-downloader ._13XQ2--error {
        color: red;
        padding: 10px;
        font-size: 12px;
        line-height: 19px
    }

    .-S-tR--ff-downloader ._2dFLA--container {
        position: relative;
        height: 100%
    }

    .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info {
        padding: 6px 15px 0;
        font-family: sans-serif
    }

    .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info div {
        margin-bottom: 5px;
        width: 100%;
        overflow: hidden
    }

    .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
        margin-top: 21px;
        font-size: 11px
    }

    .-S-tR--ff-downloader ._10vpG--footer {
        width: 100%;
        bottom: 0;
        position: absolute;
        font-weight: 700
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2V73d--loader {
        animation: n0BD1--rotation 3.5s linear forwards;
        position: absolute;
        top: -120px;
        left: calc(50% - 35px);
        border-radius: 50%;
        border: 5px solid #fff;
        border-top-color: #a29bfe;
        height: 70px;
        width: 70px;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar {
        width: 100%;
        height: 18px;
        background: #dfe6e9;
        border-radius: 5px
    }

    .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar ._1FVu9--progress-bar {
        height: 100%;
        background: #8bc34a;
        border-radius: 5px
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status {
        margin-top: 10px
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1XilH--state {
        float: left;
        font-size: .9em;
        letter-spacing: 1pt;
        text-transform: uppercase;
        width: 100px;
        height: 20px;
        position: relative
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1jiaj--percentage {
        float: right
    }
</style>

<body>
    <?php require_once TEMPLATES_PATH . "HeaderTemplate.php"; ?>
    <?php require_once VIEWS_PATH . $view . '.php'; ?>


    <script src="../styles/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>