<?php
require_once('../model/sub_categories_management.php');

function sub_categories_management()
{
    $subCategories = getSubCategories();
    
    require('../templates/sub_categories_management.php');
}