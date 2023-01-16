<?php
require_once 'app/init.php';

$readyAllQuery = $db->prepare("
	UPDATE tasks
	SET status = 1
	WHERE user_id = :user
");

$readyAllQuery->execute([
	'user'=>$_SESSION['id']
]);

header('Location:TODO.php');