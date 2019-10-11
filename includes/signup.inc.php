<?php
if (isset($_POST['signup-submit'])){
    
    require 'dbh.inc.php';
    
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];
    
    $errors = [];
    
    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($passwordrepeat)) {
        
        //header("location: signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        //exit();
        $errors['message'] = 'all field must be filled!';
    }
}