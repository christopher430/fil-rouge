<?php
// controllers/homepage.php
require_once('../model/model.php');

function homepage() {
    $disconnect= welcome();
    require('../templates/homepage.php');
}