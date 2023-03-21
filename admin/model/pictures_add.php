<?php
function addPictures()
{
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        if ($_FILES['picture']['size'] <= 1000000) {
            $fileInfo = pathinfo($_FILES['picture']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
        } else {
            $msgPictures = "Le fichier est trop volumineux ! ( Max : 1 Mo )";
            return $msgPictures;
        }
            if (in_array($extension, $allowedExtensions)) {
                move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/uploads/' . basename($_FILES['picture']['name']));
                $fileName = $_FILES['picture']['name'];
                return $fileName;
            } else {
                $msgPictures = "Merci de choisir un type de fichier valide !";
                return $msgPictures;
            }
    }
    else {
    }
}