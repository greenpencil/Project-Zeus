<?php

require_once 'Models/Functions.php';
    if(isset($_POST['vote']))
    {
       // deal with adding to db
    }
    $voting = new Voting();

    echo $voting->calcPercentage(1,1);
    echo $voting->calcPercentage(1,2);

    $apiCall= new APICall();

    $apiCall->addProgramToDB(2002);

//addToDB($option)
?>