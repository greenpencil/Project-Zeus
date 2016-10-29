<?php
require_once 'Models/Functions.php';
$user = new User();
$user->logout();
header("Location: index.php");
die();