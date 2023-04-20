<?php
session_start();

require_once('../model/welcome.php');

if(!isset($_SESSION['email_back'])) {
    require_once('../controllers/login.php');
    login();
} else { 
    try {
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            switch ($_GET['action']) {
                case 'products':
                    require_once('../controllers/products_management.php');
                    products_management();
                    break;
                case 'addProducts':
                    require_once('../controllers/products_add.php');
                    products_add();
                    break;
                case 'editProducts':
                    require_once('../controllers/products_edit.php');
                    products_edit();
                    break;    
                case 'deleteProducts':
                    require_once('../controllers/products_delete.php');
                    products_delete();
                    break;
                case 'categories':
                    require_once('../controllers/categories_management.php');
                    categories_management();
                    break;
                case 'addCategories':
                    require_once('../controllers/categories_add.php');
                    categories_add();
                    break;
                case 'editCategories':
                    require_once('../controllers/categories_edit.php');
                    categories_edit();
                    break;
                case 'deleteCategories':
                    require_once('../controllers/categories_delete.php');
                    categories_delete();
                    break;
                case 'sub_categories':
                    require_once('../controllers/sub_categories_management.php');
                    sub_categories_management();
                    break;
                case 'addSub_categories':
                    require_once('../controllers/sub_categories_add.php');
                    sub_categories_add();
                    break;
                case 'editSub_categories':
                    require_once('../controllers/sub_categories_edit.php');
                    sub_categories_edit();
                    break;
                case 'deleteSub_categories':
                    require_once('../controllers/sub_categories_delete.php');
                    sub_categories_delete();
                    break;
                case 'platforms':
                    require_once('../controllers/platforms_management.php');
                    platforms_management();
                    break;
                case 'addPlatforms':
                    require_once('../controllers/platforms_add.php');
                    platforms_add();
                    break;
                case 'editPlatforms':
                    require_once('../controllers/platforms_edit.php');
                    platforms_edit();
                    break;
                case 'deletePlatforms':
                    require_once('../controllers/platforms_delete.php');
                    platforms_delete();
                    break;
                case 'editions':
                    require_once('../controllers/editions_management.php');
                    editions_management();
                    break;
                case 'addEditions':
                    require_once('../controllers/editions_add.php');
                    editions_add();
                    break;
                case 'editEditions':
                    require_once('../controllers/editions_edit.php');
                    editions_edit();
                    break;
                case 'deleteEditions':
                    require_once('../controllers/editions_delete.php');
                    editions_delete();
                    break;
                case 'pictures':
                    require_once('../controllers/pictures_management.php');
                    pictures_management();
                    break;
                case 'editPictures':
                    require_once('../controllers/pictures_edit.php');
                    pictures_edit();
                    break;
                case 'deletePictures':
                    require_once('../controllers/pictures_delete.php');
                    pictures_delete();
                    break;    
                case 'admins':
                    require_once('../controllers/admins_management.php');
                    admins_management();
                    break;
                case 'addAdmins':
                    require_once('../controllers/admins_add.php');
                    admins_add();
                    break;
                case 'editAdmins':
                    require_once('../controllers/admins_edit.php');
                    admins_edit();
                    break;
                case 'deleteAdmins':
                    require_once('../controllers/admins_delete.php');
                    admins_delete();
                    break;         
                case 'signout':
                    require_once('../controllers/sign_out.php');
                    signOut();
                    break;
                default:
                    throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
            }
        } else {
            require_once('../controllers/homepage.php');
            homepage($_SESSION['forname_back']);
        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();

        require('../templates/error.php');
    }
}