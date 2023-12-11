<?php
namespace App\Services;

class HandleSession {

    public static function  handle() {
      if(isset($_SESSION['errors'])) {
        unset($_SESSION['errors']);
      }
      if(isset($_SESSION['error'])) {
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])) {
        unset($_SESSION['success']);
      }
    }
}