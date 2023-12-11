<?php
namespace App\Controllers;

class HomeController{
    public function index() {
        return view('home');
    }

    public function logout() {
        session_destroy();
        return redirect('/login');
    }
}