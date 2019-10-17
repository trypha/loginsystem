<?php
  session_start();
//Database Configuration File
require_once ('header.php');
require_once ('dbh.inc.php');

error_reporting(0);

  if(isset($_POST['login-submit']))
  {
     // Getting username/ email and password
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $errors = array();

 
    if (empty($email) || empty($password)){
      array_push($errors) = "email or password fiel can not be empty";

    }
   
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT * FROM users WHERE (username=:username || email=:email) and (password=:password)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    $_SESSION['email']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  } else{
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login system</title>
	<meta charset="utf-8">
	<meta name="description" content="example of a login system">
	<meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
		<header>
        
		<nav class="nav-header-main">
		<a href="index.php"> <img src="img/lamlogo.png" alt="lamlogo" style="height: 55px; width: 55px; float: left"></a>

				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">About</a></li>
					<li><a href="index.php">Services</a></li>
					<li><a href="index.php">Blog</a></li>
				</ul>
		
			<div class="header-login">
              <?php  /* 
                
                if (isset($errors)): ?>
                    
                <ul>
            <?php foreach($errors as $error): ?>
            <li style="color: red; list-style: none;"><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>

        <?php endif; ?>*/
                ?>
			<form action="" method="POST">
			<input type="email" name="email" placeholder="email address">
			<input type="password" name="password" placeholder="enter password">
			<button type="submit" name="login-submit">Login</button>
			</form>

			<a href="signup.php">signup</a>

			<form action="includes/logout.php" method="POST">
			<button type="submit" name="logout-submit">Logout</button>
			</form>
		</div>
		</nav>
		</header>
</body>
</html>
