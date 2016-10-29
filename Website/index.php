<?php
require_once 'Models/Functions.php';
//If the User hasn't already been set then one is created
if(!isset($user)) {
    $user = new User();
}
$view = new stdClass();
$view->pageTitle = 'Homepage';
require_once('Views/index.phtml');
$APICall = new APICall();
$APICall->getChannelInfo(2002);