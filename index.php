<?php
	require_once 'app/init.php';

	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Main page</title>
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<div class="wrapper">
		<h1>Добро пожаловать!</h1>
		<form action="register.php" class="register" method="POST">
			<input type="text" name="username" placeholder="Username" class="login" required>
			<input type="password" name="password" class="password" placeholder="Password" required>
			<input type="submit" value="Register" class="register-button">
		</form>

		<form action="login.php" class="authorization" method="POST">
			<input type="text" name="username" placeholder="Username" class="login" required>
			<input type="password" name="password" placeholder="Password" class="password" required>
			<input type="submit" value="Login" class="authorization-button">
		</form>
	</div>
</body>

</html>