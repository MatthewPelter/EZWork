<?php
session_start();
include './components/session-checker.php';
require_once("./classes/DB.php");

echo "Here are your notifications:";
