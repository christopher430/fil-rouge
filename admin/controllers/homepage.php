<?php
require_once('../model/welcome.php');

function homepage($f) 
{
    $welcome = welcome($f);

    require('../templates/homepage.php');
}