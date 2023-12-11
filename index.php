<?php
define('APP_ROOT', __DIR__);

require_once(APP_ROOT.'/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

spl_autoload_register(function($class) {
    
    $className = str_replace('//', DIRECTORY_SEPARATOR, $class.'.php');
    $classPath = APP_ROOT.'/app/'.$className;
    if(file_exists($classPath)) {
        require_once($classPath);
    }
});

session_start();

use App\Services\Route;

require_once(APP_ROOT.'/routes/web.php');

$route = new Route();

$route->handle();

App\Services\HandleSession::handle();