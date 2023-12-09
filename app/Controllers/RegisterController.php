<?php
namespace App\Controllers;
use App\Models\User;
use App\Rules\Validate;

class RegisterController{
    
    public function index() {
        return view('pages.register');
    }

    public function register() {
      Validate::validate(
        [
            'email' => 'required',
            'password' => 'required|confirmed',
            'name' => 'required',
        ]
        );
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->name = $_POST['name'];
        $result = $user->register();
        if($result['success'] == true) {
            return redirect('/');
        } else {
          $_SESSION['error'] = $result['message'];
          return redirect('register');
        }
    }
}