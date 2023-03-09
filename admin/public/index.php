<?php
require_once('../model/model.php');
require_once('../controllers/login.php');
require_once('../controllers/homepage.php');
require_once('../controllers/products_management.php');
$disconnect= welcome();
try {
    
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        
        if ($_GET['action'] === 'products') {
            
                products_management($disconnect);
        } elseif ($_GET['action'] === 'categories') {
                categories_management();
        } elseif ($_GET['action'] === 'sub_categories') {
                sub_categories_management();
        } elseif ($_GET['action'] === 'pictures') {
                pictures_management();
        } elseif ($_GET['action'] === 'admins') {
                admins_management();
        } else {
            throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
        }
    } else {
        homepage();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}