<?php
require_once('../model/editions_edit.php');

function editions_edit()
{
    $msg = "";
    if(isset($_GET['id'])) {
        $editionsId = $_GET['id'];
        $editions = displayEditionsDatas($editionsId);
    }
    
    if(isset($_POST['submit'])) {
        $msg = editEditionsDatas($editionsId);
        $editions = displayEditionsDatas($editionsId);
    }

    require('../templates/editions_edit.php');
}