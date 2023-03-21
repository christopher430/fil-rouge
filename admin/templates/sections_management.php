<?php ob_start(); ?>

<div class="container">
    <h1>Gestion des sections</h1>
    <form action="" method="POST" class="row my-5">
        <div class="add d-flex justify-content-start mt-5">
            <a href="index.php?action=addSections" type="submit" class="btn btn-primary" name="add">Ajouter une section</a>
        </div>
    </form>
    <?php if(empty($sections)) {
        echo '<h3 class="text-warning">Aucune section trouvée</h3>';
    } else { ?>
    <table class="table table-bordered mx-auto mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Autoriser</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($sections as $section) {
            ?>
            <tr>
                <td><?=$section['name']?></td>
                <td><?php if($section['is_enabled'] == 1){echo 'Oui';} else{echo'Non';} ?></td> 
                <td class="text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <a href="index.php?action=boundSections&id=<?= $section['id'] ?>&id_layouts=<?= $section['id_layouts'] ?>" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-richtext" viewBox="0 0 16 16">
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                        <path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208zM6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
                                        <title>Choisir la mise en page</title>
                                    </svg>                   
                                </a>
                            </div>
                            <?php if($section['id_layouts'] < 5) { ?>
                            <div class="col">
                                <a href="index.php?action=addTexts&id=<?php if(!$section['text']) {echo $section['id'];} else {echo $section['id_text'];} ?>&text=<?= $section['text'] ?>" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                        <title><?php if(!$section['text']) {echo 'Ajouter du texte';} else {echo'Modifier le texte';} ?></title>
                                    </svg>                         
                                </a>
                            </div>
                            <?php } ?>
                            <?php if($section['id_layouts'] < 4) { ?>
                            <div class="col">
                                <a href="index.php?action=addPictures&id=<?php  if(!$section['picture']) {echo $section['id'];} else {echo $section['id_picture'];} ?>&picture=<?= $section['picture'] ?>" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                        <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                        <title><?php if(!$section['picture']) {echo 'Ajouter une photo';} else {echo'Modifier la photo';} ?></title>
                                    </svg>                        
                                </a>
                            </div>
                            <?php } ?>
                            <?php if($section['id_layouts'] > 4 && $section['id_layouts'] < 8) { ?>
                            <div class="col">
                                <a href="index.php?action=addMultiplePictures&id=<?php  if(!$section['picture']) {echo $section['id'];} else {echo $section['id_picture'];} ?>&picture=<?= $section['picture'] ?>" class="btn btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                                        <title><?php if(!$section['picture']) {echo 'Ajouter des photos';} else {echo'Modifier les photos';} ?></title>
                                    </svg>                     
                                </a>
                            </div>
                            <?php } ?>
                            <!-- <?php if(!empty($pictures) && $section['text'] == 0 && $section['picture'] == 0) { ?>
                            <div class="col">
                                <a href="index.php?action=boundSections&id=<?= $section['id'] ?>&id_layouts=8" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-richtext" viewBox="0 0 16 16">
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                        <path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208zM6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
                                        <title>Choisir la mise en page</title>
                                    </svg>                   
                                </a>
                            </div>
                            <?php } ?> -->
                            <div class="col">
                                <a href="index.php?action=editSections&id=<?= $section['id'] ?>" class="btn btn-warning text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        <title>Modifier la section</title>
                                    </svg>                            
                                </a>
                            </div>
                            <div class="col">
                                <a href="index.php?action=deleteSections&id=<?= $section['id'] ?>" class="btn btn-danger" onclick="return(confirm('Voulez-vous supprimer ce produit ?'));">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        <title>Supprimer la section</title>
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
    <?php }?>
</div>
<?php   $i = -1;
        $j = -1;
    foreach($sections as $section) {

        if($section['id_layouts'] == 1 && ($section['text'] == 1 && $section['picture'] == 1)) { $i++; $j++; ?>
        <div class="container_section d-flex flex-column align-items-center my-5">
            <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; ?>" alt="">
            <h2 class="my-5 text-center"><?php echo $sketchTexts[$i]['title']; ?></h2>
            <p><?php echo $sketchTexts[$i]['paragraph_one']; ?></p>
            <p><?php echo $sketchTexts[$i]['paragraph_two']; ?></p>
            <p><?php echo $sketchTexts[$i]['paragraph_three']; ?></p>
            <p><?php echo $sketchTexts[$i]['paragraph_four']; ?></p>
        </div>
        <?php } ?>
        <?php if($section['id_layouts'] == 2 && ($section['text'] == 1 && $section['picture'] == 1)) { $i++; $j++; ?>
        <h2 class="my-5 text-center"><?php echo $sketchTexts[$i]['title']; ?></h2>
        <div class="container_section d-flex justify-content-center my-5">
            <div class="d-flex flex-column w-50 align-items-center justify-content-center left_block">
                <p><?php echo $sketchTexts[$i]['paragraph_one'];?></p>
                <p><?php echo $sketchTexts[$i]['paragraph_two'];?></p>
                <p><?php echo $sketchTexts[$i]['paragraph_three'];?></p>
                <p><?php echo $sketchTexts[$i]['paragraph_four'];?></p>
            </div>
            <div class="d-flex w-50 justify-content-center align-items-center right_block">
                <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; ?>" alt="">
            </div>
        </div>
        <?php } ?>

        <?php if($section['id_layouts'] == 3 && ($section['text'] == 1 && $section['picture'] == 1)) { $i++; $j++; ?>
        <h2 class="my-5 text-center"><?php echo $sketchTexts[$i]['title']; ?></h2>
        <div class="container_section d-flex justify-content-center my-5">
            <div class="d-flex w-50 justify-content-center align-items-center left_block">
                <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; ?>" alt="">
            </div>
            <div class="d-flex flex-column w-50 align-items-center justify-content-center right_block">
                <p><?php echo $sketchTexts[$i]['paragraph_one']; ?></p>
                <p><?php echo $sketchTexts[$i]['paragraph_two']; ?></p>
                <p><?php echo $sketchTexts[$i]['paragraph_three']; ?></p>
                <p><?php echo $sketchTexts[$i]['paragraph_four']; ?></p>
            </div>
        </div>
        <?php } ?>

        <?php if($section['id_layouts'] == 4 && $section['text'] == 1) { $i++; ?>
        <h2 class="my-5 text-center"><?php echo $sketchTexts[$i]['title']; ?></h2>
        <div class="container_section my-5">
            <div class="d-flex flex-column w-50 justify-content-center align-items-center block">
                <p><?php echo $sketchTexts[$i]['paragraph_one']; ?></p>
            </div>
            <div class="d-flex flex-column w-50 justify-content-center align-items-center block">
                <p><?php echo $sketchTexts[$i]['paragraph_two']; ?></p>
            </div>
            <div class="d-flex flex-column w-50 justify-content-center align-items-center block">
                <p><?php echo $sketchTexts[$i]['paragraph_three']; ?></p>
            </div>
        </div>
        <?php } ?>

        <?php if($section['id_layouts'] == 5 && $section['picture'] == 1) { $j++; ?>
        <div class="container_section d-flex justify-content-evenly my-5">
            <div class="block">
                <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; $j++; ?>" alt="">
            </div>
            <div class="block">
                <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; $j++; ?>" alt="">
            </div>
            <div class="block">
                <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; ?>" alt="">
            </div>
        </div>
        <?php } ?>

        <?php if($section['id_layouts'] == 6 && $section['picture'] == 1) { $j++; ?>
        <div class="container-fluid my-5">
            <div class="container_section">
                <div class="block">
                    <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; $j++; ?>" alt="">
                </div>
                <div class="block">
                    <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; $j++; ?>" alt="">
                </div>
                <div class="block">
                    <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; $j++; ?>" alt="">
                </div>
                <div class="block">
                    <img class="img-fluid" src="../<?php echo $sketchPictures[$j]['path']; ?>" alt="">
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if($section['id_layouts'] == 7 && $section['picture'] == 1) { $j++; ?>
        <div class="container-fluid my-5">
            <div class="row">
                <div class="col-lg">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../<?php echo $sketchPictures[$j]['path']; $j++; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../<?php echo $sketchPictures[$j]['path']; $j++; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../<?php echo $sketchPictures[$j]['path']; ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if($section['id_layouts'] == 8) { ?>
        <div class="container_section my-5">
            <?php foreach($sketchPictures as $sketchPicture) { ?>
            <div>
                <img class="img-fluid" src="../<?php echo $sketchPicture['path']; ?>" class="d-block w-100" alt="...">
            </div>
            <?php } ?>
        </div>
        <?php } 
        
    } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>