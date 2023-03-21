<?php
require_once('../model/connexion.php');

function getPlatforms()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM platforms'
    );
    $platforms = [];
    while (($row = $statement->fetch())) {
        $platform = [
            'id' => $row['id'],
            'name' => $row['name'],
            'id_pictures' => $row['id_pictures'],
            ];
       
        $pictureId = $platform['id_pictures'];
        $picturePath = getPicturepicturePath($pictureId);
        $platform['picture_path'] = $picturePath;
        $platforms[] = $platform;
    }
    return $platforms;
}

function getPicturepicturePath($pictureId)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT path FROM pictures
    WHERE id = :id' 
    );
    $statement->bindValue(':id', $pictureId, PDO::PARAM_INT);
    $statement->execute();
    
    $picturePaths = [];
    while (($row = $statement->fetch())) {
        $picturePath = [
            'path' => $row['path'],
        ];
        $picturePaths[] = $picturePath;
    }
    $picturePath = $picturePaths[0]['path'];
    return $picturePath;
}