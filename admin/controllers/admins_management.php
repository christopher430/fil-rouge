<?php
require_once('../model/admins_management.php');

function admins_management()
{
    $admins= getAdmins();
    
    require('../templates/admins_management.php');
}