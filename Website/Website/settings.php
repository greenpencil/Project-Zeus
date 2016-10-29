<?php
require_once 'Models/Functions.php';
//If the User hasn't already been set then one is created
if(!isset($user)) {
    $user = new User();
}
//Checks whether the User is logged in as is required to view user Settings and is reirected if the user isn't
if(!$user->isLoggedIn()) {
    header("Location: index.php");
    die();
}
$view = new stdClass();
$view->pageTitle = 'Settings';
require_once('Views/settings.phtml');