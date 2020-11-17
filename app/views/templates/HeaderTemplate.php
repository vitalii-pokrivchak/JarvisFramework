<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#"><?= APP_NAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control text-center mr-2 border-0 bg-white text-success" type="search" placeholder="Search" aria-label="Search" style="border-width: 2px !important;border-radius:10px !important;font-weight: bold;">
                <button class="btn btn-success d-flex justify-content-center align-items-center" type="submit">
                    <img src="../icons/search.svg" alt="Search" height="20px" width="20px">
                </button>
            </form>
        </div>
    </div>
</nav>