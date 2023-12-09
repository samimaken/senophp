<?php

namespace App\Models;

use App\config\Database;
use PDO;
use PDOException;

class User extends Database
{
    private $table = 'users';
    public $email;
    public $password;
    public $name;

    public function login()
    {
        try {
            $sql = "select * from $this->table where email=:email";
            $res = $this->con->prepare($sql);
            $res->execute(['email' => $this->email]);
            if ($res->rowCount() == 1) {
                $user = $res->fetch(PDO::FETCH_ASSOC);
                if ($user['password'] == md5($this->password)) {
                    $_SESSION['login'] = 'yes';
                    $_SESSION['user'] = ['name' => $user['name'], 'email' => $user['email']];
                    return ['success' => true, 'message' => 'Login Successfully'];
                } else {
                    return ['success' => false, 'message' => 'Password Required'];
                }
            } else {
                return ['success' => false, 'message' => 'Record Not Found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function register()
    {
        try {
            $sql = "INSERT INTO $this->table (`name`, `email`, `password`) VALUES (:name, :email, :password)";
            $res = $this->con->prepare($sql);
            $res->execute(['name' => $this->name, 'email' => $this->email, 'password' => md5($this->password)]);
            if ($res) {
                $_SESSION['login'] = 'yes';
                $_SESSION['user'] = ['name' => $this->name, 'email' => $this->email];
                return ['success' => true, 'message' => 'User Registered Successfully'];
            } else {
                return ['success' => false, 'message' => 'Facing Error try Again'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
