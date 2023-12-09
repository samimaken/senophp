<?php

function redirect($path) {
    return header("location: $path");
}

function view($page) {
    $page = str_replace('.', DIRECTORY_SEPARATOR, $page);
    require(APP_ROOT.'/'.$page.'.php');
}
function error($name) {
    if(isset($_SESSION['errors']) && isset($_SESSION['errors'][$name])) {
       return $_SESSION['errors'][$name];
    }
    return false;
}

function errorShow($name) {
    if(isset($_SESSION['errors']) && isset($_SESSION['errors'][$name])) {
        $error =  $_SESSION['errors'][$name];
        unset($_SESSION['errors'][$name]);
        return $error;
     }
     return false;
}

function successFlush() {
    if(isset($_SESSION['success'])) {
        $succes = $_SESSION['success'];
        return $succes;
    }
}

function errorFlush() {
    if(isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        return $error;
    }
}

function successFlushShow() {
    if(isset($_SESSION['success'])) {
        $succes = $_SESSION['success'];
        unset($_SESSION['success']);
        return $succes;
    }
}

function errorFlushShow() {
    if(isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
        return $error;
    }
}

function env($name){
     return $_ENV[$name];
}