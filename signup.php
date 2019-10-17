 <?php 
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 require_once 'header.php';
 require_once 'includes/dbh.inc.php';
 
 ?>
 <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup-submit'])){
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        
        $insert = [];
        $errors = [];
        //$errors = array();
        
        if(empty($username)){
            $errors['username'] = 'Usermame field cannot be empty';
        }
        if(empty($email)){
            $errors['email'] = 'Email field cannot be empty';
        }
        if(empty($phone)){
            $errors['phone'] = 'Phone field cannot be empty';
        }
        if(empty($password)){
            $errors['password'] = 'Password field cannot be empty';
        }
        if($password != $password_confirm){
            $errors['confirm_password'] = "Password and Password confirmation field must be same";
        }

        // After validation is complete, insert into database..
        $stmt = $conn->prepare("insert into users (username,email,phone,password) VALUES(:username, :email, :phone, :password)");
        $insert = $stmt->execute(
            [
                ':username' =>$username, 
                ':email' => $email, 
                ':phone' => $phone,
                'password' => $password
            ]
        );
        
      
    }
?>
<main>
<div class="main-wrapper">
    <h1>Sign UP</h1>
    
    <div style="background-color: white;">
        <?php  if(isset($insert)){
          echo "registration successfull";
        header ('location: index.php');
         }
        elseif (isset($insert)){
            echo "registration not successful";
            header ('location: signup.php');
        }
        ?>
        <?php if(isset($errors)): ?>
        <ul>
            <?php foreach($errors as $error): ?>
            <li style="color: red; list-style: none;"><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>

        <?php endif; ?>
    
    </div>
    <form action="" method="POST">
        <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>" placeholder="username">
        <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="e-mail">
        <input type="text" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" placeholder="phone number">
        <input type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>" placeholder="password">
        <input type="password" name="password_confirm" value="<?= isset($_POST['password_confirm']) ? $_POST['password_confirm'] : ''; ?>" placeholder="re-enter password"> <!--pattern="^\S{6,}$" onchange="this.setCustomValidity 'Password must be at least 4 characters'"-->
        <button type="submit" name="signup-submit">Signup</button>
    
    </form>
    <a href="verify.php">forgot password?</a>
    </div>
</main>