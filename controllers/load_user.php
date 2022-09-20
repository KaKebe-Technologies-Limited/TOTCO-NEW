<?php
session_start(); // Start the session
include 'controllers/login_check.php';

$user_data = check_login();