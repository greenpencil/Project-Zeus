<?php
/**
 * Created by PhpStorm.
 * User: Katie
 * Date: 30/10/2016
 * Time: 12:27
 */
require_once ("Models/Voting.php");
require_once ("Models/DatabaseCalls.php");
require_once ("Models/Channel.php");
require_once ("Models/Program.php");

$dbcalls = new DatabaseCalls();
$voting = new Voting();

$blockId = $dbcalls->getCurrentBlockId();
$percentages = array();

$channels = $dbcalls->getListOfChannelsInBlock($blockId);

foreach ($channels as $channel)
{
    $array = array($voting->calcPercentage($blockId,$channel->getId()), $channel->getId());
    array_push($percentages, $array);
}

$highest = 0;
$highest_id = 0;
$i = 0;
foreach ($percentages as $percentage)
{
    if($percentage[0] >= $highest)
    {
        $highest = $percentage[0];
        $highest_id = $percentage[1];

    }
    $i++;
}

$winner = $dbcalls->getPrograms($highest_id,$blockId);


// set as winner
$dbcalls->setWinner($winner->getId());