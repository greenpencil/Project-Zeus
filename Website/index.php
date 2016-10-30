<?php
require_once 'Models/Functions.php';
//If the User hasn't already been set then one is created
if(!isset($user)) {
    $user = new User();
}

$currentTime = new DateTime();

$chat = new Chat();
$dbcalls = new DatabaseCalls();
$view = new stdClass();
$view->pageTitle = 'Homepage';
//var_dump($view->options);
// this generates options every time the page is loaded
    $setup = new SetUp();
// Make a new block
    $setup->makeblock();
// Generate the programs
    $setup->generateChannels();

$view->options = SetUp::getListOfPrograms();

$view->block = $dbcalls->getCurrentBlockId();
require_once('Views/index.phtml');
