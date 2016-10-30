<?php
/**
 * Created by PhpStorm.
 * User: Katie
 * Date: 30/10/2016
 * Time: 10:44
 */
//resolve the last votes first
require_once ("resolveVotes.php");

require_once ("Models/SetUp.php");
require_once ("Models/Functions.php");

$setup = new SetUp();
// Make a new block
$setup->makeblock();
// Generate the programs
$setup->generateChannels();
//var_dump(SetUp::getListOfPrograms());