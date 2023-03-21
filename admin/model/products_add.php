<?php
require_once('../model/connexion.php');

$msg='';

function insertProductsDatas()
{
        $identifier = time();
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        if(isset($_POST['fstFeature'])) {
            $fstFeature = strip_tags($_POST['fstFeature']);
        } else {
            $fstFeature = '';
        }
        if(isset($_POST['scdFeature'])) {
            $scdFeature = strip_tags($_POST['scdFeature']);
        } else {
            $scdFeature = '';
        }
        if (isset($_POST['isEnabled'])) {
            $isEnabled = 1;
        } else {
            $isEnabled = 0;
        }
        $idSubCategories = getSubCategoriesId($_POST['subCategorie']);
        $pictureName = strip_tags($_POST['pictureName']);
        $path = strip_tags('assets/images/uploads/' . $_FILES['picture']['name']);
        picturesAdd($pictureName, $path);
        $picturesId = getPicturesId($pictureName);
        $idProducts = addProducts($identifier, $name, $description, $fstFeature, $scdFeature, $isEnabled, $idSubCategories, $picturesId);
        $idSelectedPlatforms = getSelectedPlatforms();
        $idSelectedEditions = getSelectedEditions();
        foreach($idSelectedPlatforms as $idSelectedPlatform) {
            addProductsPlatforms($idProducts, $idSelectedPlatform);
        }
        foreach($idSelectedEditions as $idSelectedEdition) {
            addProductsEditions($idProducts, $idSelectedEdition);
        }
        $msg='<h3 class="text-success mt-3">Le produit a bien été ajouté.</h3>';
        return $msg;    
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))
    || (!isset($_POST['subCategorie']) || empty($_POST['subCategorie']))
    || (!isset($_POST['platforms']) || empty($_POST['platforms']))
    || (!isset($_POST['editions']) || empty($_POST['editions']))
    || (!isset($_FILES['picture']) || empty($_FILES['picture']))
    || (!isset($_POST['pictureName']) || empty($_POST['pictureName']))
    ) {
		return false;
    } else {
		return true;
    }
}

function getSubCategoriesId($n)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM sub_categories WHERE name = :name';
    $subCatIdStatement = $database->prepare($sqlQuery);
    $subCatIdStatement->bindValue(':name', $n, PDO::PARAM_STR);
    $subCatIdStatement->execute();
    $idSubCategoriesTab = $subCatIdStatement->fetch();
    $idSubCategories = $idSubCategoriesTab['id'];
    return $idSubCategories;
}

function picturesAdd($name, $path)
{
    $database = dbConnect();
		$query =    'INSERT INTO pictures(name, path) 
                    VALUES (:name, :path)';
        $stmt = $database->prepare($query);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':path', $path, PDO::PARAM_STR);
        $stmt->execute();
}

function getPicturesId($pictureName)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT id FROM pictures
    WHERE name = :name'
    );
    $statement->bindValue(':name', $pictureName, PDO::PARAM_STR);
    $statement->execute();
    $picturesIds = [];
    while (($row = $statement->fetch())) {
        $picturesId = [
            'id' => $row['id'],
        ];
        $picturesIds[] = $picturesId;
    }
    $idPictures = $picturesIds[0]['id'];
    return $idPictures;
}

function addProducts($identifier, $name, $description, $fstFeature, $scdFeature, $isEnabled, $idSubCategories, $picturesId)
{
    $database = dbConnect();
    $query =    'INSERT INTO products(identifier, name, description, features_1, features_2, is_enabled, id_sub_categories, id_pictures) 
                VALUES (:identifier, :name, :description, :fstFeature, :scdFeature, :isEnabled, :idSubCategories, :picturesId)';
    $req = $database->prepare($query);
    $req->bindValue(':identifier', $identifier, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':fstFeature', $fstFeature, PDO::PARAM_STR);
    $req->bindValue(':scdFeature', $scdFeature, PDO::PARAM_STR);
    $req->bindValue(':isEnabled', $isEnabled, PDO::PARAM_BOOL);
    $req->bindValue(':idSubCategories', $idSubCategories, PDO::PARAM_INT);
    $req->bindValue(':picturesId', $picturesId, PDO::PARAM_INT);
    $req->execute();
    $idProducts = $database -> lastInsertId();
    return $idProducts;
}

function getIdProducts($identifier)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM products WHERE identifier = :identifier';
    $idProductsStatement = $database->prepare($sqlQuery);
    $idProductsStatement->bindValue(':identifier', $identifier, PDO::PARAM_INT);
    $idProductsStatement->execute();
    $idProductsTab = $idProductsStatement->fetch();
    $idProducts = $idProductsTab['id'];
    return $idProducts;
}

function getSelectedPlatforms()
{
    $selectedPlatforms = $_POST['platforms'];
    return $selectedPlatforms;
}

function getSelectedEditions()
{
    $selectedEditions = $_POST['editions'];
    return $selectedEditions;
}

function addProductsPlatforms($idProducts, $idSelectedPlatform)
{
    $database = dbConnect();
    $query =    'INSERT INTO products_platforms_editions(id_products, id_platforms)
                VALUES (:id_products, :id_platforms)';
    $req = $database->prepare($query);
    $req->bindValue(':id_products', $idProducts, PDO::PARAM_INT);
    $req->bindValue(':id_platforms', $idSelectedPlatform, PDO::PARAM_INT);
    $req->execute();
}

function addProductsEditions($idProducts, $idSelectedEdition)
{
    $database = dbConnect();
    $query =    'INSERT INTO products_platforms_editions(id_products, id_editions)
                VALUES (:id_products, :id_editions)';
    $req = $database->prepare($query);
    $req->bindValue(':id_products', $idProducts, PDO::PARAM_INT);
    $req->bindValue(':id_editions', $idSelectedEdition, PDO::PARAM_INT);
    $req->execute();
}