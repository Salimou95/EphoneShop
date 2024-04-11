<?php
function addLink($controller, $method = "index", $id = null, $admin = null)
{
    // return ROOT . "?controller=$controller&method=$method" . ($id ? "&id=$id" : "");
        return ROOT . "$controller/$method" . ($id ? "/$id" : "");
}
function addLinkAdmin($admin,$controller, $method = "index", $id = null)
{
    return ROOT . "$admin/$controller/$method" . ($id ? "/$id" : "");
}


function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function d_die($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die;
}

function redirection($url)
{
    header("Location: $url");
    exit;
}
function previousPage(){
    header ("Location:". $_SERVER["HTTP_REFERER"]);
    exit;
}

// ⚠ test 
function error($num = 404)
{
    include "errors/$num.php";
    exit;
}
