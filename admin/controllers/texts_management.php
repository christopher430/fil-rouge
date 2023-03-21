<?php
require_once('../model/texts_management.php');

function texts_management()
{
    $texts= getTexts();
    
    require('../templates/texts_management.php');
}