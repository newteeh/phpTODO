<?php

require_once 'app/init.php';

if(isset($_POST['name'])){
	$name = trim($_POST['name']);

	if(!empty($name)){
		$addedQuery = $db->prepare("
			INSERT INTO tasks (user_id, description, created_at, status)
			VALUES	(:user, :name, NOW(), 0)
		");
		$addedQuery-> execute([
			'user' => $_SESSION['id'],
			'name' => $name
		]);
	}
}

header('Location: TODO.php');