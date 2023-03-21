<?php
require_once('../model/connexion.php');

function displayProductsDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM products
    WHERE id = :id' 
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $products = [];
    while (($row = $statement->fetch())) {
        $product = [
            'name' => $row['name'],
            'description' => $row['description'],
            'features_1' => $row['features_1'],
            'features_2' => $row['features_2'],
            'is_enabled' => $row['is_enabled'],
            'id_sub_categories' => $row['id_sub_categories'],
            'id_pictures' => $row['id_pictures'],
        ];

        $platformIds = getPlatformIds($id);
        $product['platform_number'] = count($platformIds);
        for($i = 0; $i < count($platformIds); $i++) {
            $platformNames = getPlatformNames($platformIds[$i]['id_platforms']);
            $product["platform_name_$i"] = $platformNames[0]['name'];
        }
        $editionIds = getEditionIds($id);
        $product['edition_number'] = count($editionIds);
        for($i = 0; $i < count($editionIds); $i++) {
            $editionNames = getEditionNames($editionIds[$i]['id_editions']);
            $product["edition_name_$i"] = $editionNames[0]['name'];
        }

        $products[] = $product;
    }
    return $products;
}

function getPlatformIds($id)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id_platforms FROM products_platforms_editions WHERE (id_products = :id AND id_platforms IS NOT NULL)';
    $platformIdStatement = $database->prepare($sqlQuery);
    $platformIdStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $platformIdStatement->execute();
    $platformIds = $platformIdStatement->fetchAll();
    return $platformIds;
}

function getPlatformNames($platformId)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT name FROM platforms WHERE id = :id';
    $platformNameStatement = $database->prepare($sqlQuery);
    $platformNameStatement->bindValue(':id', $platformId, PDO::PARAM_INT);
    $platformNameStatement->execute();
    $platformNames = $platformNameStatement->fetchAll();
    return $platformNames;
}

function getEditionIds($id)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id_editions FROM products_platforms_editions WHERE (id_products = :id AND id_editions IS NOT NULL)';
    $editionIdStatement = $database->prepare($sqlQuery);
    $editionIdStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $editionIdStatement->execute();
    $editionIds = $editionIdStatement->fetchAll();
    return $editionIds;
}

function getEditionNames($editionId)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT name FROM editions WHERE id = :id';
    $editionNameStatement = $database->prepare($sqlQuery);
    $editionNameStatement->bindValue(':id', $editionId, PDO::PARAM_INT);
    $editionNameStatement->execute();
    $editionNames = $editionNameStatement->fetchAll();
    return $editionNames;
}

function displayNameSubCategories($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT name, is_enabled FROM sub_categories
    WHERE id = :id'
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $displayNameSubCategories = [];
    while (($row = $statement->fetch())) {
        $displayNameSubCategory = [
            'name' => $row['name'],
            'is_enabled' => $row['is_enabled'],
        ];
        $displayNameSubCategories[] = $displayNameSubCategory;
    }
    return $displayNameSubCategories;
}

function displayPicturesDatas($idPictures)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT name FROM pictures
    WHERE id = :id'
    );
    $statement->bindValue(':id', $idPictures, PDO::PARAM_INT);
    $statement->execute();
    
    $pictures = [];
    while (($row = $statement->fetch())) {
        $picture = [
            'name' => $row['name'],
        ];
        $pictures[] = $picture;
    }
    $firstPictureName = $pictures[0]['name'];
    return $firstPictureName;
}

function deleteUploadsPicture($idPictures)
{
    $path = getPicturePath($idPictures);
    unlink("../$path");
}

function deletePlatormsEditions($productsId)
{
    $database = dbConnect();
    $query = 'DELETE FROM products_platforms_editions WHERE id_products=:id';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':id', $productsId, PDO::PARAM_INT);
    $stmt->execute();
}

function getPicturePath($idPictures)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT path FROM pictures WHERE id = :id';
    $pathStatement = $database->prepare($sqlQuery);
    $pathStatement->bindValue(':id', $idPictures, PDO::PARAM_INT);
    $pathStatement->execute();
    $pathTab = $pathStatement->fetch();
    $path = $pathTab['path'];
    return $path;
}

function editProductsDatas($id, $firstPictureName)
{
    $msg='';

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
        $picturesId = getPicturesId($firstPictureName);
        picturesEdit($picturesId, $pictureName, $path);
        editProducts($id, $name, $description, $fstFeature, $scdFeature, $isEnabled, $idSubCategories, $picturesId);
        $idSelectedPlatforms = getSelectedPlatforms();
        $idSelectedEditions = getSelectedEditions();
        foreach($idSelectedPlatforms as $idSelectedPlatform) {
            addProductsPlatforms($id, $idSelectedPlatform);
        }
        foreach($idSelectedEditions as $idSelectedEdition) {
            addProductsEditions($id, $idSelectedEdition);
        }
        $msg='<h3 class="text-success mt-3">Le produit a bien été modifié</h3>';
        return $msg;    
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))
    || (!isset($_POST['subCategorie']) || empty($_POST['subCategorie']))
    || (!isset($_POST['platforms']) || empty($_POST['platforms']))
    || (!isset($_POST['editions']) || empty($_POST['editions']))
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

function picturesEdit($picturesId, $pictureName, $path)
{
    $database = dbConnect();
		$query =    'UPDATE pictures SET name = :name, path = :path
                WHERE id = :id';
        $stmt = $database->prepare($query);
        $stmt->bindValue(':id', $picturesId, PDO::PARAM_INT);
        $stmt->bindValue(':name', $pictureName, PDO::PARAM_STR);
        $stmt->bindValue(':path', $path, PDO::PARAM_STR);
        $stmt->execute();
}

function editProducts($id, $name, $description, $fstFeature, $scdFeature, $isEnabled, $idSubCategories, $picturesId)
{
    $database = dbConnect();
    $query =    'UPDATE products SET name = :name, description = :description, features_1 = :features_1, features_2 = :features_2, is_enabled = :is_enabled, id_sub_categories = :id_sub_categories, id_pictures = :picturesId
                WHERE id = :id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':features_1', $fstFeature, PDO::PARAM_STR);
    $req->bindValue(':features_2', $scdFeature, PDO::PARAM_STR);
    $req->bindValue(':is_enabled', $isEnabled, PDO::PARAM_BOOL);
    $req->bindValue(':id_sub_categories', $idSubCategories, PDO::PARAM_INT);
    $req->bindValue(':picturesId', $picturesId, PDO::PARAM_INT);
    $req->execute();
    $idProducts = $database -> lastInsertId();
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

function addProductsPlatforms($id, $idSelectedPlatform)
{
    $database = dbConnect();
    $query =    'INSERT INTO products_platforms_editions(id_products, id_platforms)
                VALUES (:id_products, :id_platforms)';
    $req = $database->prepare($query);
    $req->bindValue(':id_products', $id, PDO::PARAM_INT);
    $req->bindValue(':id_platforms', $idSelectedPlatform, PDO::PARAM_INT);
    $req->execute();
}

function addProductsEditions($id, $idSelectedEdition)
{
    $database = dbConnect();
    $query =    'INSERT INTO products_platforms_editions(id_products, id_editions)
                VALUES (:id_products, :id_editions)';
    $req = $database->prepare($query);
    $req->bindValue(':id_products', $id, PDO::PARAM_INT);
    $req->bindValue(':id_editions', $idSelectedEdition, PDO::PARAM_INT);
    $req->execute();
}