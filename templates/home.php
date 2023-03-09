<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameRenew</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg mt-2">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="row w-100">
                <div class="col-lg-2 d-flex align-items-center justify-content-lg-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand fs-1 ms-sm-5" href="#">GameRenew</a>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <form class="d-flex w-100" role="search">
                        <input class="form-control w-100 border-0 rounded-0 bg-light mt-sm-3" type="search" placeholder="Rechercher un jeu ..." aria-label="Search">
                        <a href="" class="d-flex justify-content-center align-items-center text-secondary bg-light pe-3 mt-sm-3" type=submit>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </a>
                    </form>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex align-items-center justify-content-around w-100">
                            <li class="nav-item">
                                <a class="nav-link text-success" href="#">Magasins</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" href="#">Mon compte</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" href="#">Panier</a>
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
                <div class="col-lg-2 p-0">
                    <ul class="nav flex-column bg-light">
                        <li class="nav-item text-white bg-success ps-2 text-lg-start text-sm-center">
                            <h5>Univers console ™</h5>
                        </li>
                        <li class="nav-item ms-3 text-lg-start text-sm-center">
                            <a class="nav-link text-secondary" href="#">Playsation 4</a>
                        </li>
                        <li class="nav-item ms-3 text-lg-start text-sm-center">
                            <a class="nav-link text-secondary" href="#">Playstation 5</a>
                        </li>
                        <li class="nav-item ms-3 text-lg-start text-sm-center">
                            <a class="nav-link text-secondary" href="#">Xbox Series X</a>
                        </li>
                        <li class="nav-item ms-3 text-lg-start text-sm-center">
                            <a class="nav-link text-secondary" href="#">Switch</a>
                        </li>
                        <li class="nav-item ms-3 text-lg-start text-sm-center">
                            <a class="nav-link text-secondary" href="#">Xbox One</a>
                        </li>
                        <li class="nav-item ms-3 text-lg-start text-sm-center">
                            <a class="nav-link text-secondary" href="#">Playsation 3</a>
                        </li>
                        <li class="nav-item ms-3 text-lg-start text-sm-center">
                            <a class="nav-link text-secondary" href="#">Xbox 360</a>
                        </li>
                    </ul>
                    <ul class="nav flex-column bg-light mt-3">
                        <li class="nav-item text-white bg-success ps-2 text-lg-start text-lg-start text-sm-center">
                            <h5>Genres</h5>
                        </li>
                    </ul>
                    <div class="accordion accordion-flush" id="accordionFlush">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed bg-light text-secondary ps-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOe">
                                    <span class="w-100 d-flex justify-content-sm-center justify-content-lg-start">Action</span>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
                                <div class="accordion-body w-100 bg-light">
                                    <ul class="nav flex-column bg-light text-lg-start text-sm-center">
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">MMORPG</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Beat’em all</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">FPS</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed bg-light text-secondary ps-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    <span class="w-100 d-flex justify-content-sm-center justify-content-lg-start">Aventure</span>
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush">
                                <div class="accordion-body w-100 bg-light">
                                    <ul class="nav flex-column bg-light text-lg-start text-sm-center">
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Monde ouvert</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Narratif</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Bac à sable</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed bg-light text-secondary ps-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    <span class="w-100 d-flex justify-content-sm-center justify-content-lg-start">RPG</span>
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush">
                            <div class="accordion-body w-100 bg-light text-lg-start text-sm-center">
                                    <ul class="nav flex-column bg-light">
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Anime</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Dark Fantaisy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed bg-light text-secondary ps-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    <span class="w-100 d-flex justify-content-sm-center justify-content-lg-start">Simulation</span>
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlush">
                            <div class="accordion-body w-100 bg-light text-lg-start text-sm-center">
                                    <ul class="nav flex-column bg-light">
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Survie</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Construction</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Conduite</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed bg-light text-secondary ps-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    <span class="w-100 d-flex justify-content-sm-center justify-content-lg-start">Action</span>
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlush">
                            <div class="accordion-body w-100 bg-light text-lg-start text-sm-center">
                                    <ul class="nav flex-column bg-light">
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Football</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Combat</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Automobile</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed bg-light text-secondary ps-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                    <span class="w-100 d-flex justify-content-sm-center justify-content-lg-start">Stratégie</span>
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlush">
                            <div class="accordion-body w-100 bg-light text-lg-start text-sm-center">
                                    <ul class="nav flex-column bg-light">
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">MOBA</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Tour par tour</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="nav-link text-secondary" href="#">Tower defense</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-10 p-0">
                    <div class="row">
                        <div class="col d-flex" style="height: 300px;">
                            <img class="img w-100" src="../assets/images/GOWR-LV-Header-02.jpg" alt="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <a href=""><img class="img-fluid" src="../assets/images/xboxx.png" alt=""></a>
                                <a href=""><img class="img-fluid" src="../assets/images/ps5.png" alt=""></a>
                                <a href=""><img class="img-fluid" src="../assets/images/ps4.png" alt=""></a>
                                <a href=""><img class="img-fluid" src="../assets/images/switch.png" alt=""></a>
                                <a href=""><img class="img-fluid" src="../assets/images/xboxone.png" alt=""></a>
                                <a href=""><img class="img-fluid" src="../assets/images/ps3.png" alt=""></a>
                                <a href=""><img class="img-fluid" src="../assets/images/xbox360.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="ms-lg-5 text-lg-start text-sm-center mb-3 border-3 border-start border-success mt-5">Meilleures ventes</h4>
                        <!-- Boucle ici -->
                        <div class="col-lg-1 col-sm-6 ms-lg-5">
                            <a href="">
                                <div class="row">
                                    <div class="d-flex">
                                        <span class="bg-primary text-white px-1 text_sm">PS5</span><span class="bg-light px-1 text_sm">Nioh Collection</span>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <img src="../assets/images/nioh-collection-e190385.jpg" alt="">
                                </div>
                                <div class="row mt-1">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span><strong>33,56 €</strong></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Fin boucle -->
                    </div>
                    <div class="row">
                        <h4 class="ms-lg-5 text-lg-start text-sm-center mb-3 border-3 border-start border-success mt-5">Derniers arrivages</h4>
                        <!-- Boucle ici -->
                        <div class="col-lg-1 col-sm-6 ms-lg-5">
                            <a href="">
                                <div class="row">
                                    <div class="d-flex">
                                        <span class="bg-primary text-white px-1 text_sm">PS5</span><span class="bg-light px-1 text_sm">Nioh Collection</span>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <img src="../assets/images/nioh-collection-e190385.jpg" alt="">
                                </div>
                                <div class="row mt-1">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span><strong>33,56 €</strong></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Fin boucle -->
                    </div>
                    <div class="row">
                        <h4 class="ms-lg-5 text-lg-start text-sm-center mb-3 border-3 border-start border-success mt-5">Exclusivités</h4>
                        <!-- Boucle ici -->
                        <div class="col-lg-1 col-sm-6 ms-lg-5">
                            <a href="">
                                <div class="row">
                                    <div class="d-flex">
                                        <span class="bg-primary text-white px-1 text_sm">PS5</span><span class="bg-light px-1 text_sm">Nioh Collection</span>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <img src="../assets/images/nioh-collection-e190385.jpg" alt="">
                                </div>
                                <div class="row mt-1">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span><strong>33,56 €</strong></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Fin boucle -->
                    </div>
                </div>
            </div>
        </div>
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
</body>
</html>