<?php
function current_url()
{
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $count = strpos($url, "&");
    if ($count != 0) {
        $validURL =  substr_replace($url, "?", $count, 1);
    } else {
        $validURL = $url;
    }
    return $validURL;
}