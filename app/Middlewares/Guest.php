<?php
namespace App\Middlewares;

class Guest {
   
    public function handle() {
        if(isset($_SESSION['login'])) {
            return redirect('/');
        }
    }
}