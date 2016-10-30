<?php
session_start();
ob_start();

date_default_timezone_set('Europe/London');

//Loads up all the Classes
spl_autoload_register(function($class) {
    require_once '/' . $class . '.php';
});

//Removes any SQL or HTML etc inputted into a form etc.
function sanitize($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

//Encrypts a string using a BCrype Password Hash and a Salt.
function encrypt($string, $salt = '') {
    if(!($salt === '')) {
        $options = [
            'cost' => 11,
            'salt' => $salt
        ];
        return password_hash($string, PASSWORD_BCRYPT, $options);
    }
    return password_hash($string, PASSWORD_BCRYPT);
}

//Get's the Salt.
function salt($length) {
    return mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
}

//Get's a UniqID which is then encrypted.
function setUniqueID() {
    return encrypt(uniqid());
}

//Checks whether the User is remembered through a Cookie and if so logs the User back in.
if((isset($_COOKIE['actInsid'])) && (!isset($_SESSION['sessionInsid']))) {
    $encryption = $_COOKIE['actInsid'];
    $instance = DB::getInstance()->specificSQL('SELECT * FROM sessions WHERE encryption= ' . $encryption);
    if($instance->getCount()) {
        $user = new User($instance->getFirst()->user_id);
        $user->login();
    }
}

function getPoster($title) {
    $title = str_replace(' ', '+', $title);
    ini_set("allow_url_fopen", 1);
    $json = file_get_contents("http://www.omdbapi.com/?t=". $title ."&y=&plot=short&r=json");
    $obj = json_decode($json);
    return $obj->Poster;
}

?>