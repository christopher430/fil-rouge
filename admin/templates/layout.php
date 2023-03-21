<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Back-Office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/product_management.css">
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-3"></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                            <a class="nav-link text-white fs-5" href="index.php?action=platforms">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Gestion des plateformes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-5" href="index.php?action=editions">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Gestion des éditions
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
                        <li class="nav-item mt-5">
                            <a class="nav-link text-white fs-5" href="index.php?action=signout">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Déconnexion
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
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
    <div class="col-md-9 col-lg-10" style="margin-top: 100px;">
        <main>
            <?= $content ?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>
</html>