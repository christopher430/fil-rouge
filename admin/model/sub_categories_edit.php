<?php
require_once('../model/connexion.php');

function displaySubCategoriesDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM sub_categories
    WHERE id = :id'
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $subCategories = [];
    while (($row = $statement->fetch())) {
        $subCategory = [
            'name' => $row['name'],
            'description' => $row['description'],
            'is_enabled' => $row['is_enabled'],
            'id_categories' => $row['id_categories'],
        ];
        $subCategories[] = $subCategory;
    }
    return $subCategories;
}

function displayNameCategories($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT name, is_enabled FROM categories
    WHERE id = :id'
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $displayNameCategories = [];
    while (($row = $statement->fetch())) {
        $displayNameCategory = [
            'name' => $row['name'],
            'is_enabled' => $row['is_enabled'],
        ];
        $displayNameCategories[] = $displayNameCategory;
    }
    return $displayNameCategories;
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


function editSubCategoriesDatas($subCategoriesId)
{
    $checkInputs = checkInputs();
    if($checkInputs) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      if (isset($_POST['isEnabled'])) {
        $isEnabled = 1;
      } else {
          $isEnabled = 0;
      }
      $categoryName = $_POST['cat'];
      $categoriesId = getCategoryId($categoryName);

      $msg = editSubCategories($subCategoriesId, $name, $description, $isEnabled, $categoriesId);
      return $msg;
    } else {
      $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
      return $msg;
    }
}

function getCategoryId($categoryName)
{
  $database = dbConnect();
  $statement = $database->prepare(
  'SELECT id FROM categories
  WHERE name = :name'
  );
  $statement->bindValue(':name', $categoryName, PDO::PARAM_STR);
  $statement->execute();
  
  $categories = [];
  while (($row = $statement->fetch())) {
      $category = [
          'id' => $row['id'],
      ];
      $categories[] = $category;
  }
  $categoriesId = $categories[0]['id'];
  return $categoriesId;
}

function editSubCategories($subCategoriesId, $name, $description, $isEnabled, $categoriesId)
{
  $database = dbConnect();
  $query = 'UPDATE sub_categories SET name = :name, description = :description, is_enabled = :is_enabled, id_categories = :id_categories
            WHERE id = :id';
  $req = $database->prepare($query);
  $req->bindValue(':id', $subCategoriesId, PDO::PARAM_INT);
  $req->bindValue(':name', $name, PDO::PARAM_STR);
  $req->bindValue(':description', $description, PDO::PARAM_STR);
  $req->bindValue(':is_enabled', $isEnabled, PDO::PARAM_BOOL);
  $req->bindValue(':id_categories', $categoriesId, PDO::PARAM_INT);
  $req->execute();
  $msg = '<h3 class="text-success mt-3">Votre modification a bien été enregistrée</h3>';
  return $msg;
}