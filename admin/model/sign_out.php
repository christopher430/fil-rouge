<?php
function disconnect()
{
    if (isset($_SESSION['email_back'])) {
        session_destroy();
        header('location: index.php');
    }
}