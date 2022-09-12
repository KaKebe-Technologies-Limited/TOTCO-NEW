<?php

$error = "";

if(isset($_POST['submit'])){
    if ($_POST['username'] != "" || $_POST['password'] != ""){

        $user_name = $_POST['username'];
        $password = $_POST['password'];
        
        $jsonobj =  file_get_contents("http://localhost/apiCampusWeekly_offline/api/NZ3Rz/l0GinUZ3r.php?user_name=$user_name&password=$password");
    
        $PHPobj = json_decode($jsonobj);
        if ($PHPobj->success == 0) {
            $error = $PHPobj->message;
            

        } else {
            // $_SESSION['user_data'] = $PHPobj->data;

            header("Location:index.php");
            die;
        }
    }
    
}
?>