<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameRecycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg mt-2">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="row w-100">
                <div class="col-lg-4 d-flex align-items-center justify-content-lg-start">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand border-start border-success border-top rounded-circle px-3 py-2 fs-1 ms-sm-5" href="index.php">GameRecycle</a>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <form class="d-flex w-100" role="search" method="post" action="index.php?action=search">
                        <input class="form-control w-100 border-0 rounded-0 bg-light mt-sm-3" type="text" name="search" placeholder="Rechercher un jeu ..." aria-label="Search">
                    </form>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex align-items-center justify-content-around">
                            <li class="nav-item">
                                <a class="nav-link btn btn-success text-white rounded-pill mx-2" href="index.php?action=location">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                                    </svg>
                                    Magasin
                                </a>
                            </li>
                            <li class="nav-item d-flex">
                                <?php if(isset($_SESSION['forname'])) { ?>
                                <a class="nav-link btn btn-success text-white rounded-start-pill ms-2" href="index.php?action=account&customerIdentifier=<?= $_SESSION['customer'] ?>">
                                <?php } else {?>
                                <a class="nav-link btn btn-success text-white border rounded-pill mx-2" href="index.php?action=login">
                                <?php } ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                    </svg>
                                    <?php if(isset($_SESSION['forname'])) { echo 'Bonjour ' . $_SESSION['forname']; } else { echo 'Mon compte';} ?>
                                </a>
                                <?php if(isset($_SESSION['forname'])) { ?>
                                <a class="nav-link btn btn-dark text-white rounded-end-pill me-2" href="index.php?action=signOut">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        <title>Se déconnecter</title>
                                    </svg>
                                </a>
                                <?php } ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-success text-white border rounded-pill mx-2" href="index.php?action=basketDisplay" class="btn position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    Panier
                                    <?php if(isset($cartsCounter)) { if($cartsCounter > 0) { ?>
                                    <span class="badge rounded-pill bg-danger">
                                        <?= $cartsCounter ?>
                                    </span>
                                    <?php }} ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    </header>
    <main>
    <div class="container-fluid">
        <div class="row">
            <?php if(isset($platforms)) { ?>
            <div class="col-lg-2 p-0">
                <ul class="nav flex-column bg-light">
                    <li class="nav-item text-white bg-success ps-2 text-lg-start text-sm-center">
                        <h5>Univers console ™</h5>
                    </li>
                    <?php foreach($platforms as $platform) { ?>
                    <li class="nav-item ms-3 text-lg-start text-sm-center">
                        <a class="nav-link text-secondary" href="index.php?action=displayByPlatforms&id=<?= $platform['id'] ?>"><?= $platform['name'] ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <ul class="nav flex-column bg-light mt-3">
                    <li class="nav-item text-white bg-success ps-2 text-lg-start text-lg-start text-sm-center">
                        <h5>Genres</h5>
                    </li>
                </ul>
                <?php foreach($categories as $category) { ?>
                <div class="accordion accordion-flush" id="accordionFlush">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed bg-light text-secondary ps-4" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $category['id'] ?>" aria-expanded="false" aria-controls="flush-collapseOe">
                                <span class="w-100 d-flex justify-content-sm-center justify-content-lg-start"><?= $category['name'] ?></span>
                            </button>
                        </h2>
                        <div id="<?= $category['id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
                            <div class="accordion-body w-100 bg-light">
                                <ul class="nav flex-column bg-light text-lg-start text-sm-center">
                                    <?php for($i = 0; $i < ((count($category)) - 3); $i++) { $subCategoryName = $category["sub_category_name_$i"]['name']; $subCategoryId = $category["sub_category_name_$i"]['id']; ?>
                                    <li class="nav-item ms-3">
                                        <a class="nav-link text-secondary" href="index.php?action=displayBySubCategories&id=<?= $subCategoryId ?>"><?= $subCategoryName ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="<?php if(isset($platforms)) { echo 'col-lg-10 p-0'; } else { echo 'col-lg-12';} ?>">
                <div class="row">
                    <div class="col d-flex" style="height: 300px;">
                        <img class="img w-100" src="../assets/images/GOWR-LV-Header-02.jpg" alt="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="d-flex align-items-center">
                            <?php if(isset($platforms)) { foreach($platforms as $platform) { ?>
                                <a href="index.php?action=displayByPlatforms&id=<?= $platform['id'] ?>"><img class="img-fluid" src="../admin/<?= $platform['path'] ?>" alt="<?= $platform['name'] ?>"></a>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            <?php if(isset($content)) { echo $content; } ?>
    </main>
    <footer>
        <div class="container-fluid mt-4 bg-dark pb-3">
            <div class="container pt-5">
                <div class="row">
                    <div class="col col-xs-1"></div>
                    <div class="col col-xs-2">
                        <img class="img-fluid" src="../assets/images/warranty.png" alt="">
                    </div>
                    <div class="col col-xs-2">
                        <img class="img-fluid" src="../assets/images/repackage.png" alt="">
                    </div>
                    <div class="col col-xs-2">
                        <img class="img-fluid" src="../assets/images/post.png" alt="">
                    </div>
                    <div class="col col-xs-2">
                        <img class="img-fluid" src="../assets/images/withdrawal.png" alt="">
                    </div>
                    <div class="col col-xs-2">
                        <img class="img-fluid" src="../assets/images/lessExpensive.png" alt="">
                    </div>
                    <div class="col col-xs-1"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 mt-5 text-white text-lg-start text-sm-center text_sm">
                        <h5>Les plateformes</h5>
                        <div class="row mt-4 ms-2">
                            <div class="col-md-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li>PS5</li>
                                    <li>PS4</li>
                                    <li>PS3</li>
                                    <li>PSP</li>
                                    <li>PS VITA</li>
                                    <li>XBOX X</li>
                                    <li>XBOX ONE</li>
                                    <li>XBOX 360</li>
                                    <li>SWITCH</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li>WII U</li>
                                    <li>WII</li>
                                    <li>3DS</li>
                                    <li>DS</li>
                                    <li>RETRO GAMING</li>
                                    <li>CULTURE GEEK</li>
                                    <li>DVD/BLU-RAY</li>
                                    <li>PC</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5 text-white text-lg-start text-sm-center text_sm">
                        <h5>À propos</h5>
                        <div class="row mt-4 ms-2">
                            <div class="col-md-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li>Qui sommes nous ?</li>
                                    <li>Besoin d'aide ?</li>
                                    <li>La Franchise</li>
                                    <li>CGV</li>
                                    <li>Nos magasins</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li>CGU</li>
                                    <li>Mentions légales</li>
                                    <li>Frais de port</li>
                                    <li>L'actualité</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5 text-white text_sm">
                        <h5 class=" text-lg-start text-sm-center d-sm-none d-lg-block">Restons en contact !</h5>
                        <div class="row mt-4 ms-2 d-sm-none d-lg-block">
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                            </div>
                            <div class="col">
                                <span>Vous avez une question ?</span><br>
                                <span>Cliquez ici !</span>
                            </div>
                        </div>
                        <div class="row mt-3 ms-2">
                            <div class="col-lg-6 col-sm-12 d-flex justify-content-sm-center">
                                <a href="" class="text-white fw-bold py-2 px-3 contact_button">Contactez Nous !</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5 text-white text-lg-start text-sm-center text_sm">
                        <h5>Sécurisé</h5>
                        <div class="row mt-4 ms-lg-2">
                            <img src="../assets/images/widget03.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>
</html>