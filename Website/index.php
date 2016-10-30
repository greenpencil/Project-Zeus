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
$view->block = $dbcalls->getCurrentBlockId();
$listOfChannels = $dbcalls->getListOfChannelsInBlock($view->block);
$view->options = array();
$view->lastVote = $dbcalls->getLastVote();
foreach ($listOfChannels as $channel)
{
    array_push($view->options,$dbcalls->getPrograms($channel->getId(), $view->block));
}

require_once('Views/index.phtml');
