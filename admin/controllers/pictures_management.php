<?php
require_once('../model/pictures_management.php');

function pictures_management()
{
    $pictures= getPictures();
    
    require('../templates/pictures_management.php');
}