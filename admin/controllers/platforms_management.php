<?php
require_once('../model/platforms_management.php');

function platforms_management()
{
    $platforms = getPlatforms();
    
    require('../templates/platforms_management.php');
}