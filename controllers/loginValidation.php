<?php
 session_start();
 $error = '';
?>

<?php
if (isset($_POST['submit'])) {
    if ($_POST['user_name'] != "" || $_POST['password'] !="") {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $jsonobj = file_get_contents("https://totco.kakebe.com/api/users/createUser.php");
        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $error = $PHPobj->message;
        } else {
            $_SESSION['user_data'] = $PHPobj->data;
            header("Location: index.php");
        }
    }
}

