<?php
require_once '../Models/Functions.php';

$voting = new Voting();


print ($voting->addVote($_GET['blockid'], $_GET['channelid'], $_GET['userid']));
//echo rand(10, 90) . "%";