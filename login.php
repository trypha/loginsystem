<?php
session_start();

require_once ('header.php');
require_once ('includes/dbh.inc.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(ISSET($_POST['login-submit'])){
		if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `member` WHERE `username`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($email,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['username'] = $fetch['email'];
				header("location: dashboard.php");
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'index.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
		}
	}

/*if (isset($_POST['login-submit'])){
    
$email = $_POST['email'];
$password =md5($_POST['password']);

$errors = arrays();
    
    if (empty($email)) {
    array_push($errors, "Email is required");
  }

  if (empty($password)) {
    array_push($errors, "Password is required");
  }

    //select from database
    
    if (count($errors) == 0) {
    $password = md5($password);
    $query = $conn->prepare("SELECT * FROM users WHERE email= ? AND password= ?");
    $query->execute(array($email, $password));
        
    // $results = mysqli_query($connection, $query);
    if ($query->rowCount()== 1) {
      $_SESSION['email'] = $email;
      $userData = $query->fetch();
      if ($userData['verified'] == '1') {
        $_SESSION['verified'] = 'true';
      }
      $_SESSION['success'] = "You are now logged in";
      header('location: dashboard.php');
    } else {
      //array_push($errors, );
    
     echo("Wrong email/password combination");
          
    }
  }
}*/
  /*  $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
     $result = $stmt->execute(
    [
        ':email' =>$email,
        ':password' =>$password,
    ]
    );
    $result = $stmt->fetchcolumn();
        if ($Count == "1"){
           $_SESSION['email'] = $email;

            $_SESSION['success'] = 'you are now logged in';
            header('location:dashboard.php');
        }
    else{
        echo 'login not successful';
    }
        
}*/