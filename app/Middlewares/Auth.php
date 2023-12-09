<?php
namespace App\Middlewares;

class Auth {
   
    public function handle() {
        if(!isset($_SESSION['login'])) {
            return redirect('/login');
        }
    }
}