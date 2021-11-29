<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['userid']);

$_SESSION['logoutSuccess'] = "Logged out successfully";
header('location:../login/index');
