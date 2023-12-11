<?php
namespace App\Controllers;
use App\Models\User;
use App\Rules\Validate;

class LoginController{
    
    public function index() {
        return view('auth.login');
    }

    public function login() {
      Validate::validate(
        [
            'email' => 'required',
            'password' => 'required',
        ]
        );
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $result = $user->login();
        if($result['success'] == true) {
            return redirect('/');
        } else {
          $_SESSION['error'] = $result['message'];
          return redirect('login');
        }
    }
}