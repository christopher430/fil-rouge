<?php
require_once('../model/connexion.php');

function getPath($idSection)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT path FROM pictures
    WHERE id_sections = :id' 
    );
    $statement->bindValue(':id', $idSection, PDO::PARAM_INT);
    $statement->execute();
    
    $paths = [];
    while (($row = $statement->fetch())) {
        $path = [
            'path' => $row['path'],
        ];
        $paths[] = $path;

    }
    if(count($paths) > 1) {
        return $paths;
    } else {
        if(isset($paths[0]['path'])) {
            $path = $paths[0]['path'];
            return $path;
        } else {
            $path = "empty";
            return $path;
        }    
    }
}

function removeUploadsPictures($path)
{
    if(count($path) > 1) {
        for($i = 0; $i < count($path); $i++) {
            unlink("../$path");
        }
    } else {
        unlink("../$path");
    }


}

function deleteTexts($idSection)
{
    // $database = dbConnect();
    // $query = 'DELETE FROM texts WHERE id_sections=:id_sections';
    // $stmt = $database->prepare($query);
    // $stmt->bindValue(':id_sections', $idSection, PDO::PARAM_INT);
    // $stmt->execute();
}

function deletePictures($idSection)
{
    // $database = dbConnect();
    // $query = 'DELETE FROM pictures WHERE id_sections=:id_sections';
    // $stmt = $database->prepare($query);
    // $stmt->bindValue(':id_sections', $idSection, PDO::PARAM_INT);
    // $stmt->execute();
}

function deleteSections($idSection)
{
    // $database = dbConnect();
    // $query = 'DELETE FROM sections WHERE id=:id';
    // $stmt = $database->prepare($query);
    // $stmt->bindValue(':id', $idSection, PDO::PARAM_INT);
    // $stmt->execute();
}