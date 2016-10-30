<?php
require_once ("Models/DatabaseCalls.php");
require_once ("Models/Functions.php");
$dbcalls = new DatabaseCalls();
var_dump($dbcalls->getListOfChannelsInBlock(24));