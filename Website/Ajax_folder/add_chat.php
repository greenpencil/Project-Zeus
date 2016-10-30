<?php
require_once '../Models/Functions.php';

$Chatting = new Chat();

$voting->addChat($_GET['userid'], $_GET['message']);