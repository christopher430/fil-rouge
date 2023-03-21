<?php
require_once('../model/connexion.php');

function displayPicturesDatas($picturesId)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT name FROM pictures
    WHERE id = :id'
    );
    $statement->bindValue(':id', $picturesId, PDO::PARAM_INT);
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

function checkPicturesInputs()
{
  if (!isset($_POST['name']) || (empty($_POST['name']))) {
	  return false;
  } else {
		return true;
  }
}

function deleteUploadsPicture($picturesId)
{
    $path = getPicturePath($picturesId);
    unlink("../$path");
}

function getPicturePath($picturesId)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT path FROM pictures WHERE id = :id';
    $pathStatement = $database->prepare($sqlQuery);
    $pathStatement->bindValue(':id', $picturesId, PDO::PARAM_INT);
    $pathStatement->execute();
    $pathTab = $pathStatement->fetch();
    $path = $pathTab['path'];
    return $path;
}

function editPicturesDatas($picturesId, $firstPictureName)
{
    $msg = '';
    $msgPicture = '';
    $checkInputs = checkPicturesInputs();

    if($checkInputs) {
      $name = strip_tags($_POST['name']);
      $path = strip_tags('assets/images/uploads/' . $_FILES['picture']['name']);
      $msg = picturesEdit($picturesId, $name, $path);
      return $msg;
    } else {
      $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
      return $msg;
    }
}

function picturesEdit($picturesId, $name, $path)
{
    $database = dbConnect();
		$query =    'UPDATE pictures SET name = :name, path = :path
                WHERE id = :id';
        $stmt = $database->prepare($query);
        $stmt->bindValue(':id', $picturesId, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':path', $path, PDO::PARAM_STR);
        $stmt->execute();
        $msg = '<h3 class="text-success mt-3">Votre modification a bien été enregistrée</h3>';
        return $msg;      
}