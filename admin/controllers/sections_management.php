<?php
require_once('../model/sections_management.php');
require_once('../model/pictures_management.php');

function sections_management()
{
    $sketch = "";
    $parts = "";
    $pictures = getPictures();
    $sketchTexts = getSketchTexts();
    $sketchPictures = getSketchPictures();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $sections = getSections();

    foreach($sections as $section) {
        $idLayouts = $section['id_layouts'];
        $layouts = getLayoutNameById($idLayouts);
        $cssName = $layouts[0]['css_name'];
    }
        
    
    require('../templates/sections_management.php');
}