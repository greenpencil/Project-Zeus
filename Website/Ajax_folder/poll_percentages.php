<?php
require_once '../Models/Functions.php';

$voting = new Voting();
echo $voting->calcPercentage($_GET['blockid'], $_GET['channelid']). "%";