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
			<form action="includes/login.php" method="POST">
			<input type="text" name="emailid" placeholder="email address">
			<input type="password" name="pwd" placeholder="enter password">
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
