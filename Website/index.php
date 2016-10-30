<?php
require_once 'Models/Functions.php';
//If the User hasn't already been set then one is created
if(!isset($user)) {
    $user = new User();
}
$setup = new SetUp();
$chat = new Chat();
$view = new stdClass();
$view->pageTitle = 'Homepage';
$setup->generateChannels();
$view->options = $setup->getListOfPrograms();
require_once('Views/index.phtml');
