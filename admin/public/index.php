<?php
session_start();

require_once('../model/welcome.php');

if(!isset($_SESSION['email'])) {
    require_once('../controllers/login.php');
    login();
} else { 
    try {
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            switch ($_GET['action']) {
                case 'sections':
                    require_once('../controllers/sections_management.php');
                    sections_management();
                    break;
                case 'addSections':
                    require_once('../controllers/sections_add.php');
                    sections_add();
                    break;
                case 'boundSections':
                    require_once('../controllers/sections_bound.php');
                    sections_bound();
                    break;
                case 'editSections':
                    require_once('../controllers/sections_edit.php');
                    sections_edit();
                    break;
                case 'deleteSections':
                    require_once('../controllers/sections_delete.php');
                    sections_delete();
                    break;  
                case 'addTexts':
                    if($_GET['text'] == 0) {
                        require_once('../controllers/texts_add.php');
                        texts_add();
                        break;
                    } else {
                        require_once('../controllers/texts_edit.php');
                        texts_edit();
                        break;
                    }
                case 'addPictures':
                    if($_GET['picture'] == 0) {
                        require_once('../controllers/pictures_add.php');
                        pictures_add();
                        break;
                    } else {
                        require_once('../controllers/pictures_edit.php');
                        pictures_edit();
                        break;
                    }
                case 'addMultiplePictures':
                    if($_GET['picture'] == 0) {
                        require_once('../controllers/pictures_multiple_add.php');
                        pictures_multiple_add();
                        break;
                    } else {
                        require_once('../controllers/pictures_multiple_edit.php');
                        pictures_multiple_edit();
                        break;
                    }
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
            homepage($_SESSION['forname']);
        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();

        require('../templates/error.php');
    }
}