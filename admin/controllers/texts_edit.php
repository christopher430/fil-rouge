<?php
require_once('../model/texts_edit.php');

function texts_edit()
{
    $msg = "";
    if(isset($_GET['id'])) {
        $textsId = $_GET['id'];
        $texts = displayTextsDatas($textsId);
    }
    
    if(isset($_POST['submit'])) {
        $msg = editTextsDatas($textsId);
    }

    require('../templates/texts_edit.php');
}