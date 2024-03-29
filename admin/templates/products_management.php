<?php ob_start(); ?>

<div class="container">
    <h1>Gestion des produits</h1>
    <div class="d-flex justify-content-end mt-5">
        <a href="index.php?action=addProducts" type="submit" class="btn btn-primary" name="add">Ajouter un produit</a>
    </div>
    <table class="table table-bordered mx-auto mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Caractéristique 1</th>
                <th>Caractéristique 2</th>
                <th>Prix</th>
                <th>Autoriser</th>
                <th>Sous-catégorie</th>
                <th>Plateforme</th>
                <th>Edition</th>
                <th>Photo</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($products as $product){?>
            <tr>
                <td><?=$product['name']?></td>
                <td><?=$product['description']?></td>
                <td><?=$product['features_1']?></td>
                <td><?=$product['features_2']?></td>
                <td><?=$product['price']?></td>
                <td><?php if($product['is_enabled']==1) {echo 'Oui';} else {echo 'Non';} ?></td>
                <td><?=$product['sub_category_name']?></td>
                <td>
                    <?php for($i=0; $i < $product['platform_number']; $i++) {
                            $platformName = $product["platform_name_$i"];
                            echo $platformName . '<br>';
                        } 
                    ?>
                </td>
                <td>
                    <?php for($i=0; $i < $product['edition_number']; $i++) {
                            $platformName = $product["edition_name_$i"];
                            echo $platformName . '<br>';
                        } 
                    ?>
                </td>
                <td class="text-center"><img src="../<?=$product['picture_path']?>" alt="<?= $product['name'] ?>"></td>
                <td class=" col-2 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <a href="index.php?action=editProducts&id=<?= $product['id'] ?>" class="btn btn-warning text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        <title>Modifier</title>
                                    </svg>                            
                                </a>
                            </div>
                            <div class="col">
                                <a href="index.php?action=deleteProducts&id=<?= $product['id'] ?>" class="btn btn-danger" onclick="return(confirm('Voulez-vous supprimer ce produit ?'));">
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