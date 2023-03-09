<?php
    include 'action/action_login.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Back Office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<main>
    <div class="col-md-9 col-lg-12 mt-5">
        <div class="container">
            <form method="POST" action="index.php" class="row g-3">
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
                        <button type="signout" class="btn btn-primary" name="connect" style="width: 300px;">Se connecter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

    
<script>
    function show() {
       document.getElementById('lock').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16" onclick="hide()"><path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z"/></svg><label for="">Masquer mot de passe</label>';
       document.getElementById('pass').type = 'text';
    }
    function hide() {
        document.getElementById('lock').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16" onclick="show()"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/></svg><label for="">Afficher mot de passe</label>';
        document.getElementById('pass').type = 'password';
    }
</script>



</body>

</html>