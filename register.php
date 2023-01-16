<?php

require_once 'app/init.php';

if (isset($_POST['username']) && ($_POST['password'])) {
	$username = trim($_POST['username']);
	$password = $_POST['password'];

	if (!empty($username) && !empty($password)) {
		$addedUserQuery = $db->prepare("
			INSERT INTO users (login, password, created_at)
			VALUES (:username, :password, NOW())
			");
		$addedUserQuery->execute([
			'username' => $username,
			'password' => $password
		]);
		$loginUserQuery = $db->prepare("
			SELECT id FROM users
			WHERE login = :username and password = :password
			");
		$loginUserQuery->execute([
			'username' => $username,
			'password' => $password,

		]);
		$result = $loginUserQuery->fetchALL(PDO::FETCH_ASSOC);
		$_SESSION['id'] = $result[0]['id'];
	}
}



header('Location:TODO.php');