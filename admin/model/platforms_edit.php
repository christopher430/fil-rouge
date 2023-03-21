<?php
require_once('../model/connexion.php');

function displayPlatformsDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM platforms
    WHERE id = :id'
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $platforms = [];
    while (($row = $statement->fetch())) {
        $platform = [
            'name' => $row['name'],
            'id_pictures' => $row['id_pictures'],
        ];
        $platforms[] = $platform;
    }
    return $platforms;
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

function checkInputs()
{
  if (!isset($_POST['name']) || (empty($_POST['name'])) 
  || (!isset($_POST['pictureName']) || (empty($_POST['pictureName'])))) {
	  return false;
  } else {
		return true;
  }
}


function editplatformsDatas($platformsId, $firstPictureName)
{
    $msg = '';
    $msgPicture = '';
    $checkInputs = checkInputs();

    if($checkInputs) {
      $name = strip_tags($_POST['name']);
      $pictureName = strip_tags($_POST['pictureName']);
      $path = strip_tags('assets/images/uploads/' . $_FILES['picture']['name']);
      $pictureId = getPicturesId($firstPictureName);
      picturesEdit($pictureId, $pictureName, $path);
      $msg = editplatforms($platformsId, $name, $pictureId);
      return $msg;
    } else {
      $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
      return $msg;
    }
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
    $pictureId = $picturesIds[0]['id'];
    return $pictureId;
}

function deleteUploadsPicture($idPictures)
{
    $path = getPicturePath($idPictures);
    unlink("../$path");
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

function editplatforms($platformsId, $name, $pictureId)
{
  $database = dbConnect();
  $query = 'UPDATE platforms SET name = :name, id_pictures = :id_pictures
            WHERE id = :id';
  $req = $database->prepare($query);
  $req->bindValue(':id', $platformsId, PDO::PARAM_INT);
  $req->bindValue(':name', $name, PDO::PARAM_STR);
  $req->bindValue(':id_pictures', $pictureId, PDO::PARAM_INT);
  $req->execute();
  $msg = '<h3 class="text-success mt-3">Votre modification a bien été enregistrée</h3>';
  return $msg;
}