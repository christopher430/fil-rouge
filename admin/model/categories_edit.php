<?php
require_once('../model/connexion.php');

function displayCategoriesDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM categories
    WHERE id = :id'
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $categories = [];
    while (($row = $statement->fetch())) {
        $categorie = [
            'name' => $row['name'],
            'description' => $row['description'],
            'is_enabled' => $row['is_enabled'],
        ];
        $categories[] = $categorie;
    }
    return $categories;
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))
    ) {
		return false;
    } else {
		return true;
    }
}


function editCategoriesDatas($categoriesId)
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
      $msg = editCategories($categoriesId, $name, $description, $isEnabled);
      return $msg;
    } else {
      $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
      return $msg;
    }
}

function editCategories($categoriesId, $name, $description, $isEnabled)
{
  $database = dbConnect();
  $query = 'UPDATE categories SET name = :name, description = :description, is_enabled = :is_enabled
            WHERE id = :id';
  $req = $database->prepare($query);
  $req->bindValue(':id', $categoriesId, PDO::PARAM_INT);
  $req->bindValue(':name', $name, PDO::PARAM_STR);
  $req->bindValue(':description', $description, PDO::PARAM_STR);
  $req->bindValue(':is_enabled', $isEnabled, PDO::PARAM_BOOL);
  $req->execute();
  $msg = '<h3 class="text-success mt-3">Votre modification a bien été enregistrée</h3>';
  return $msg;
}