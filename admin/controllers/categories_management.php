<?php
require_once('../model/categories_management.php');

function categories_management()
{
    $categories = getCategories();
    
    require('../templates/categories_management.php');
}