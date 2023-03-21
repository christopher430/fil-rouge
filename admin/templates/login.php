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

<div class="col-md-9 col-lg-12 mt-5">
    <div class="container">
        <form method="POST" action="" class="row">
            <div class="col-md-6 mx-auto border border-dark rounded">
                <h1>Connectez-vous</h1>
                <label for="mail">Adresse Email</label>
                <input type="text" placeholder="Entrez votre adresse Email" class="form-control" name="email">
                <label for="password">Mot de passe</label>
                <input id="pass" type="password" placeholder="Entrez votre mot de passe" class="form-control" name="password">
                <div class="mt-1" id="lock">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16" onclick="show()">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg><label for="">Afficher mot de passe</label>
                </div>
                <div class="mt-2 mb-2 text-center">
                    <button type="signout" class="btn btn-primary" name="submit" style="width: 300px;">Se connecter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container text-center mt-5">
        <?= $msg ?>
    </div>
</div>

<script src="../assets/script/login.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>
</html>