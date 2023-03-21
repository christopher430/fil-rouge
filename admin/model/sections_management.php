<?php
require_once('../model/connexion.php');

function getSections()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM sections'
    );
    $sections = [];
    while (($row = $statement->fetch())) {
        $section = [
            'id' => $row['id'],
            'name' => $row['name'],
            'text' => $row['text'],
            'picture' => $row['picture'],
            'is_enabled' => $row['is_enabled'],
            'id_layouts' => $row['id_layouts'],
            ];
        $idSection = $section['id'];
        if($section['text'] == 1) {
            $idText = getTextId($idSection);
            $section['id_text'] = $idText;
        }
        if($section['picture'] == 1) {
            $idPicture = getPictureId($idSection);
            $section['id_picture'] = $idPicture;
        }
        $sections[] = $section;
    }
    return $sections;
}

function getTextId($idSection)
{
    $database = dbConnect();
    $query = 'SELECT id FROM texts WHERE id_sections =:id_sections';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':id_sections', $idSection, PDO::PARAM_INT);
    $stmt->execute();
    $textStmt = $stmt->fetch();
    $idText = $textStmt['id'];
    return $idText;
}

function getPictureId($idSection)
{
    $database = dbConnect();
    $query = 'SELECT id FROM pictures WHERE id_sections =:id_sections';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':id_sections', $idSection, PDO::PARAM_INT);
    $stmt->execute();
    $pictureStmt = $stmt->fetch();
    $idPicture = $pictureStmt['id'];
    return $idPicture;
}

function getSketchTexts()
{
    $database = dbConnect();
    $sqlQuery = 'SELECT * FROM texts as t
                INNER JOIN sections as s ON t.id_sections = s.id';
    $textsStatement = $database->prepare($sqlQuery);
    $textsStatement->execute();
    $sketchTexts = $textsStatement->fetchAll();
    return $sketchTexts;
}

function getSketchPictures()
{
    $database = dbConnect();
    $sqlQuery = 'SELECT * FROM pictures as pic
                INNER JOIN sections as p ON pic.id_sections = p.id';
    $picturesStatement = $database->prepare($sqlQuery);
    $picturesStatement->execute();
    $sketchPictures = $picturesStatement->fetchAll();
    return $sketchPictures;
}

function getLayoutNameById($idLayouts)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT css_name FROM layouts
    WHERE id = :id'
    );
    $statement->bindValue(':id', $idLayouts, PDO::PARAM_INT);
    $statement->execute();
    
    $layouts = [];
    while (($row = $statement->fetch())) {
        $layout = [
            'css_name' => $row['css_name'],
        ];
        $layouts[] = $layout;
    }
    return $layouts;
}
