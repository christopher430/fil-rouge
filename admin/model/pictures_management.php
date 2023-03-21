<?php
require_once('../model/connexion.php');

function getPictures()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM pictures'
    );
    $pictures = [];
    while (($row = $statement->fetch())) {
        $picture = [
            'id' => $row['id'],
            'name' => $row['name'],
            'path' => $row['path'],
            'id_sections' => $row['id_sections'],
            ];
        $sectionId = $picture['id_sections'];
        $sectionName = getSectionName($sectionId);
        $picture['section_name'] = $sectionName;    
        $pictures[] = $picture;
    }
    return $pictures;
}

function getSectionName($sectionId)
{
    $database = dbConnect();
    $query = 'SELECT name FROM sections WHERE id=:id';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':id', $sectionId, PDO::PARAM_INT);
    $stmt->execute();
    $sectionStmt = $stmt->fetch();
    $sectionName = $sectionStmt['name'];
    return $sectionName;
}