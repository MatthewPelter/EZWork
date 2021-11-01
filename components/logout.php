<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['userid']);
session_destroy();
header('location:../login/index');
