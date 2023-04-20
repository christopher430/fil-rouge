<?php
function welcome($f)
{
    if (isset($f)) {
        $welcome= 'Bonjour ' . $f ;
        return $welcome;
    } else {
        $welcome= "Bonjour Invité(e)";
        return $welcome;
    }
}