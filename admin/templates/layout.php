<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Back-Office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-3" href=""></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="index.php?action=signout"><?=$disconnect?></a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark vh-100">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-4" aria-current="page" href="index.php?action=">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-5" aria-current="page" href="index.php?action=products">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Gestion des produits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-5" href="index.php?action=categories">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Gestion des catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-5" href="index.php?action=sub_categories">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Gestion des sous-catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-5" href="index.php?action=pictures">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Gestion des photos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-5" href="index.php?action=admins">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Gestion des administrateurs
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                <h5 class="text-white h4">Collapsed content</h5>
                <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-lg-10" style="margin-top: 100px;">
        <main>
            <?= $content ?>
        </main>
    </div>
</body>
</html>