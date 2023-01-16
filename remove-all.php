<?php
require_once 'app/init.php';

$removeAllQuery = $db->prepare("
	DELETE FROM tasks
	WHERE user_id = :user
");

$removeAllQuery->execute([
	'user' => $_SESSION['id']
]);


header('Location:TODO.php');