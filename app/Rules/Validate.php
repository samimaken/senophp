<?php
namespace App\Rules;

class Validate {

    private static $errors = [];

    public static function validate($rules = []) {
        foreach($rules as $key => $rule) {
            $rule = explode("|", $rule);
             foreach($rule as $item) {
                if($item == 'required') {
                    if(empty(trim($_POST[$key]))) {
                        self::$errors[$key] = "$key is required";
                    }
                }
                if($item == 'confirmed') {
                    if(!empty(trim($_POST[$key])) && isset($_POST['password_confirmation']) && $_POST[$key] != $_POST['password_confirmation']) {
                        self::$errors[$key] = "$key is not matched";
                    }
                }
             }
        }
        if(count(self::$errors)) {
            $_SESSION['errors'] = self::flattenErrors();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            unset($_SESSION['errors']);
        }
    }

    public static function flattenErrors()
    {
        $flattened = [];
        foreach (self::$errors as $key => $value) {
            $flattened[$key] = $value;
        }
        return $flattened;
    }
}