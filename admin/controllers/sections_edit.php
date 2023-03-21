<?php
require_once('../model/sections_edit.php');

function sections_edit()
{
    $msg = "";
    if(isset($_GET['id'])) {
        $sectionsId = $_GET['id'];
        $sections = displaySectionsDatas($sectionsId);
    }
    
    if(isset($_POST['submit'])) {
        $msg = editSectionsDatas($sectionsId);
    }

    require('../templates/sections_edit.php');
}