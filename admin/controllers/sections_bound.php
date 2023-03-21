<?php
require_once('../model/sections_bound.php');

function sections_bound()
{
    $idSections = $_GET['id'];

    $layouts = getLayouts();
    $msg = boundLayout($idSections);            
    $layouts = getLayouts();

    require('../templates/sections_bound.php');
}