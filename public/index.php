<?php
session_start();

    try {
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            switch ($_GET['action']) {
                case 'performance':
                    require_once('../controllers/.php');
                    //();
                    break;
                case 'contact':
                    require_once('../controllers/.php');
                    //();
                    break;
                case 'galery':
                    require_once('../controllers/.php');
                    //();
                    break;    
                case 'actuality':
                    require_once('../controllers/.php');
                    //();
                    break;
                case 'reviews':
                    require_once('../controllers/.php');
                    //();
                    break;
                default:
                    throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
            }
        } else {
            require_once('../controllers/homepage.php');
            homepage();
        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();

        require('../templates/error.php');
    }