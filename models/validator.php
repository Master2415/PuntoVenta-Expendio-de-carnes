<?php
namespace App\Models;

class Validator
{
    public static function cleanString($str)
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>