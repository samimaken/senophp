<?php 
use App\Services\Route;


Route::add('', 'HomeController', 'index', 'GET', ['Auth']);
Route::add('logout', 'HomeController', 'logout', 'GET', ['Auth']);
Route::add('login', 'LoginController', 'index', 'GET', ['Guest']);
Route::add('login-submit', 'LoginController', 'login', 'POST', ['Guest']);
Route::add('register', 'RegisterController', 'index', 'GET', ['Guest']);
Route::add('register-submit', 'RegisterController', 'register', 'POST', ['Guest']);
