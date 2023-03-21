<?php ob_start(); ?>

<div class="container">

<h1>Gestion des administrateurs</h1>

<form action="" method="POST" class="row my-5">
    <div class="add d-flex justify-content-start mt-5">
        <a href="index.php?action=addAdmins" type="submit" class="btn btn-primary" name="add">Ajouter un administrateur</a>
    </div>
</form>


<table class="table table-bordered mx-auto mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach($admins as $admin) {
        ?>
        <tr>
            <td><?=$admin['id']?></td>
            <td><?=$admin['name']?></td>
            <td><?=$admin['forname']?></td>
            <td><?=$admin['email']?></td>
            <td><?=$admin['password']?></td>
            <td class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="index.php?action=editAdmins&id=<?= $admin['id'] ?>" class="btn btn-warning text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    <title>Modifier</title>
                                </svg>                            
                            </a>
                        </div>
                        <div class="col">
                            <a href="index.php?action=deleteAdmins&id=<?= $admin['id'] ?>" class="btn btn-danger" onclick="return(confirm('Voulez-vous supprimer ce produit ?'));">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    <title>Supprimer</title>
                                </svg>                                
                            </a>
                        </div>
                    </div>
                </div>      
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>