<?php
require_once('../model/editions_management.php');

function editions_management()
{
    $editions= getEditions();
    
    require('../templates/editions_management.php');
}