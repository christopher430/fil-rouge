<?php $title = "The Barber Shop"; ?>

<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg p-0">
            <div id="carouselBarber1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets\images\Coiffure_960p_142.jpg" class="d-block w-100" alt="produits">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="pacifico fst-italic display-3">Coiffure</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets\images\BARTHEL-Coiffure_960p_136.jpg" class="d-block w-100" alt="rasoirs">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="pacifico fst-italic display-3">Coiffure</h1>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBarber1" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselBarber1" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg p-0">
            <div id="carouselBarberIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselBarberIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselBarberIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets\images\barbe-1_3_25214_v1.jpeg" class="d-block w-100" alt="Barbe ciseau">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="pacifico fst-italic display-3">Barbe</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets\images\hug_s-barber-shop_109.jpg" class="d-block w-100" alt="perruque homme">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="pacifico fst-italic display-3">Barbe</h1>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBarberIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselBarberIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>        
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-5 d-flex flex-column">
            <h1 class="pacifico fst-italic display-3">Horaires</h1>
        </div>
        <div class="col-lg-7">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="col" class="text-uppercase">Mardi à vendredi</th>
                        <td scope="col">8H00-11H45<br>13H30-18H00</td>
                    </tr>
                    <tr>
                        <th scope="col" class="text-uppercase">Samedi</th>
                        <td scope="col">8H30-17H00</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center text-uppercase">
                <h5>Sur rendez-vous uniquement</h5>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5" style="height: 600px;">
    <div class="row h-100">
    <div class="col-lg bg-dark d-flex justify-content-center align-items-center pacifico">
            <a href="index.php?action=galery" class="h-75 w-75 d-flex justify-content-center align-items-center get_border text-white display-1 fst-italic">
                <div class="">
                    Galerie
                </div>
            </a>
        </div>
        <div class="col-lg bg-secondary d-flex justify-content-center align-items-center pacifico">
            <a href="index.php?action=actuality" class="h-75 w-75 d-flex justify-content-center align-items-center get_border text-white display-1 fst-italic">
                <div class="">
                    Actualités
                </div>
            </a>
        </div>
        <div class="col-lg bg-dark d-flex justify-content-center align-items-center pacifico">
            <a href="index.php?action=reviews" class="h-75 w-75 d-flex justify-content-center align-items-center get_border text-white display-1 fst-italic">
                <div class="">
                    Avis clients
                </div>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid bg_hair">
    <div class="row py-5">
        <div class="col d-flex flex-column align-items-center justify-content-center justify-content-around text-center text-white">
            <div class="w-75">
                <h1>SALON DE COIFFURE À SARREGUEMINES</h1>
                <p>Vous êtes à la recherche d’un coiffeur barbier à Sarreguemines ?</p>
                <p>Venez pousser les portes du Barber Shop, une équipe de spécialistes vous attend !</p>
                <h2 class="mt-5">LA PETITE HISTOIRE DU SALON</h2>
                <p>Créé en 2003, le salon est repris en 2015 par le gérant actuel. Ce coiffeur de profession est aussi présent sur la commune de Grosbliederstroff.</p>
            </div>
        </div>
        <div class="col me-5 ratio ratio-16x9">
            <iframe width="1280" height="720" src="https://www.youtube.com/embed/z8V0h1Cgevs" title="cap jo barber shop tuto rasage" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg p-0">
            <img class="img-fluid" src="../assets\images\BARTHEL-Coiffure_960p_206.jpg" alt="le salon">
        </div>
        <div class="col-lg bg-secondary text-white text-center d-flex flex-column justify-content-center align-items-center p-0">
            <div class="w-75">
                <h4>DES PRESTATIONS SOIGNÉES</h4>
                <p class="mt-3">Dans une ambiance cosy et chaleureuse, vous apprécierez le savoir-faire et la discrétion de toute l’équipe. Vous découvrirez le plaisir d’un rasage à l’ancienne avec serviette chaude et blaireau, et vous pourrez placer entre de bonnes mains la coupe de vos cheveux.</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg bg-secondary text-white text-center d-flex flex-column justify-content-center align-items-center p-0">
            <div class="w-75">
                <h3>DES PRODUITS DE QUALITÉ</h3>
                <p class="mt-3">Afin de vous assurer un résultat probant, Coiffure Barthel met un point d’honneur à vous proposer des articles de qualité : Bluebeards Revenge, Défi pour Homme, Proraso, Ducktails ou encore Hairgum font partie des grandes marques que vous retrouverez dans le salon.</p>
                <p>Forts d’une grande expérience et ayant à cœur le bien-être de nos clients, nous vous accueillons chaleureusement du mardi au samedi.  N’hésitez pas à Barber Shop, votre Coiffeur barbier à Sarreguemines.</p>
            </div>
        </div>
        <div class="col-lg p-0">
            <img class="img-fluid" src="../assets\images\BARTHEL-Coiffure_960p_203.jpg" alt="les produits">
        </div>
    </div>
</div>
<div class="container-fluid" style=" height: 250px;">
    <div class="row h-100">
        <div class="col-lg-3 col-sm-6 bg_room1"></div>
        <div class="col-lg-3 col-sm-6 bg_room2"></div>
        <div class="col-lg-3 col-sm-6 bg_scissors"></div>
        <div class="col-lg-3 col-sm-6 bg_badger"></div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>