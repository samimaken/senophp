<?php
namespace App\Controllers;

class HomeController{
    public function index() {
        return view('pages.home');
    }

    public function logout() {
        session_destroy();
        return redirect('/login');
    }
}