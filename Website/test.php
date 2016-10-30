<?php
require_once ("Models/DatabaseCalls.php");
require_once ("Models/Voting.php");
require_once ("Models/Functions.php");
$dbcalls = new DatabaseCalls();
var_dump($dbcalls->getListOfChannelsInBlock(24));
$voting = new Voting();
echo $voting->checkUserVoted(3, 41);
echo $voting->addVote(41,3,3);