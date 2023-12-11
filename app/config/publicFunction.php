<?php

function redirect($path) {
    return header("location: $path");
}

function view($page) {
    $page = str_replace('.', DIRECTORY_SEPARATOR, $page);
    require(APP_ROOT.'/pages/'.$page.'.php');
}
function input_error($name) {
    if(isset($_SESSION['errors']) && isset($_SESSION['errors'][$name])) {
       return $_SESSION['errors'][$name];
    }
    return false;
}

function success() {
    if(isset($_SESSION['success'])) {
        $succes = $_SESSION['success'];
        return $succes;
    }
}

function error() {
    if(isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        return $error;
    }
}

function env($name){
     return $_ENV[$name];
}