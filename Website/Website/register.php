<?php
require_once 'Models/Functions.php';
//If the User hasn't already been set then one is created
if(!isset($user)) {
    $user = new User();
}
//Checks whether the User is logged, if they are then they can't register again and are redirected.
if($user->isLoggedIn()) {
    header("Location: index.php");
    die();
}
$view = new stdClass();
$view->pageTitle = 'Register';
require_once('Views/register.phtml');