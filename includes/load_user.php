<?php
  session_start();
  if (isset($_SESSION['user_data'])) {
    $user_data = $_SESSION['user_data'];
    //return $user_data;
  } else {
    header("Location: auth-login.php");
  }
?>