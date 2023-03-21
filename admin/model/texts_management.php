<?php
require_once('../model/connexion.php');

function getTexts()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM texts'
    );
    $texts = [];
    while (($row = $statement->fetch())) {
        $text = [
            'id' => $row['id'],
            'title' => $row['title'],
            'paragraph_one' => $row['paragraph_one'],
            'paragraph_two' => $row['paragraph_two'],
            'paragraph_three' => $row['paragraph_three'],
            'paragraph_four' => $row['paragraph_four'],
            'id_sections' => $row['id_sections'],
            ];
        $sectionId = $text['id_sections'];
        $sectionName = getSectionName($sectionId);
        $text['section_name'] = $sectionName;
        $texts[] = $text;
    }
    return $texts;
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