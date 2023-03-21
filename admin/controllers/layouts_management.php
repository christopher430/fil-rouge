<?php
require_once('../model/layouts_management.php');

function layouts_management()
{
    $layouts= getLayouts();
    
    require('../templates/layouts_management.php');
}