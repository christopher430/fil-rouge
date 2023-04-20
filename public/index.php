<?php
session_start();
if(!isset($_SESSION['user'])) {
    $_SESSION['user'] = time();
}

if(isset($_SESSION['customer'])) {
    $user =  $_SESSION['customer'];
} else {
    $user =  $_SESSION['user'];
}
try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        switch ($_GET['action']) {
            case 'displayByPlatforms':
                require_once('../controllers/display_by_platforms.php');
                display_by_platforms($user);
                break;
            case 'displayBySubCategories':
                require_once('../controllers/display_by_subcategories.php');
                display_by_subcategories($user);
                break;
            case 'search':
                require_once('../controllers/search.php');
                search($user);
                break;
            case 'productSheet':
                require_once('../controllers/product_sheet.php');
                product_sheet($user);
                break;
            case 'basketAdd':
                require_once('../controllers/basket_add.php');
                basket_add($user);
                break;
            case 'basketDisplay':
                require_once('../controllers/basket_display.php');
                basket_display();
                break;
            case 'cartRowDelete':
                require_once('../controllers/cart_row_delete.php');
                cart_row_delete();
                break;
            case 'login':
                require_once('../controllers/login.php');
                login($user);
                break;
            case 'order':
                require_once('../controllers/display_order.php');
                display_order($user);
                break;
            case 'account':
                require_once('../controllers/account.php');
                account();
                break;
            case 'accountDelete':
                require_once('../controllers/account_delete.php');
                account_delete($user);
                break;
            case 'location':
                require_once('../controllers/location.php');
                location($user);
                break;
            case 'signOut':
                require_once('../controllers/signOut.php');
                signOut($user);
                break;
            default:
                throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
        }
    } else {
        require_once('../controllers/homepage.php');
        homepage($user);
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('../templates/error.php');
}