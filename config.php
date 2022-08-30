<?php

use Facebook\Facebook;

require_once 'vendor/autoload.php';

if(!session())
{
    session_start();
}

$facebook = new \Facebook\Facebook([

    "app_id" => "1424366694732898",
    "app_secret" => "593cde0db6a61f194ed31daf7017fe93",
    "default_graph_version" => "v14.0"
]);
?>