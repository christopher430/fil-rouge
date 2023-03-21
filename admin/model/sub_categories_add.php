<?php
require_once('../model/connexion.php');
require_once('../model/categories_management.php');

$msg='';

function insertDatas()
{
    $check = checkInputs();

    if($check) {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        if (isset($_POST['isEnabled'])) {
            $isEnabled = 1;
        } else {
            $isEnabled = 0;
        }
        $catName = strip_tags($_POST['cat']);
        $idCategories = getCategoriesId($catName);
        $msg = addSubCategories($name, $description, $isEnabled, $idCategories);
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))
    || (!isset($_POST['cat']) || empty($_POST['cat']))
    ) {
		return false;
    } else {
		return true;
    }
}

function getCategoriesId($catName)
{
    $database = dbConnect();

    $sqlQuery = 'SELECT id FROM categories WHERE name = :name';
    $catIdStatement = $database->prepare($sqlQuery);
    $catIdStatement->bindValue(':name', $catName, PDO::PARAM_STR);
    $catIdStatement->execute();
    $idCategoriesTab = $catIdStatement->fetch();
    $idCategories = $idCategoriesTab['id'];
    return $idCategories;
}

function addSubCategories($name, $description, $isEnabled, $idCategories)
{
    $database = dbConnect();
    $query =    'INSERT INTO sub_categories(name, description, is_enabled, id_categories) 
                VALUES (:name, :description, :isEnabled, :id_categories)';
    $req = $database->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':isEnabled', $isEnabled, PDO::PARAM_BOOL);
    $req->bindValue(':id_categories', $idCategories, PDO::PARAM_INT);
    $req->execute();
    $msg='<h3 class="text-success mt-3">La sous-catégorie a bien été ajoutée.</h3>';
    return $msg;
}