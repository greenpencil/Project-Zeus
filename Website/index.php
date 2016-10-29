<?php
require_once 'Models/Functions.php';
//If the User hasn't already been set then one is created
if(!isset($user)) {
    $user = new User();
}
$view = new stdClass();
$view->pageTitle = 'Homepage';
<<<<<<< HEAD
=======
require_once('Views/index.phtml');
>>>>>>> master
$APICall = new APICall();
$channel1 = $APICall->getChannelInfo(2002);
$channel2 = $APICall->getChannelInfo(2006);
$channel3 = $APICall->getChannelInfo(6000);
$channel4 = $APICall->getChannelInfo(1621);
$view->options = array([
    $channel1,$channel2,$channel3,$channel4
]);
require_once('Views/index.phtml');
