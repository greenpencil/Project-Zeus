<?php

require_once 'Models/Functions.php';
require_once 'Models/SetUp.php';
    if(isset($_POST['vote']))
    {
       // deal with adding to db
    }
    $voting = new Voting();

    echo $voting->calcPercentage(1,1);
    echo $voting->calcPercentage(1,2);

    $apiCall= new APICall();

    //$apiCall->addProgramToDB(2002);

$dbCalls = new DatabaseCalls();
$dbCalls->getChannelById(1);

//$voting = new SetUp();
//$voting->generateChannels();
//addToDB($option)
?>