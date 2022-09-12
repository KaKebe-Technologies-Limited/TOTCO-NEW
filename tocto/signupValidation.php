<?php

$error = "";

if(isset($_POST['submit'])){
    if ($_POST['user_name'] != "" || $_POST['email'] != ""|| $_POST['fullname'] != ""|| $_POST['password'] != "" || $_POST['passwordConfirm']){
        $user_name = urlencode($_POST['user_name']); 
        $email = urlencode($_POST['email']);
        $fullname = urlencode($_POST['fullname']);
        $password = urlencode($_POST['password']);
        $passwordConfirm = urlencode($_POST['passwordConfirm']);
       
        
        
        
        // $jsonobj =  file_get_contents("http://localhost/apiCampusWeekly_offline/api/NZ3Rz/createUZ3r.php?user_name=$user_name&email=$email&fullname=$fullname&reg_number=$reg_number&phone_number=$phone_number&program_id=$program_id&yearOfStudy=$yearOfStudy&password=$password&passwordConfirm=$passwordConfirm");
        $jsonobj =  file_get_contents("http://localhost/apiCampusWeekly_offline/api/NZ3Rz/createUZ3r.php?user_name=$user_name&fullname=$fullname&email=$email&password=$password&passwordConfirm=$passwordConfirm");
    
        $PHPobj = json_decode($jsonobj);
        if ($PHPobj->success == 0) {
            $error = $PHPobj->message;
            

        } else {
            // $_SESSION['user_data'] = $PHPobj->data;

            header("Location:login.php");
            die;
        }
    }
    
}
?>

<!-- fullname, email, reg_number, username, password, program_id, yearOfStudy, phone_number -->