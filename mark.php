<?php
require_once 'app/init.php';

if(isset($_GET['as'], $_GET['item'])){
	$as = $_GET['as'];
	$item = $_GET['item'];


	switch($as){
		case 'done':
			$doneQuery = $db->prepare("
			UPDATE tasks
			SET status = 1
			WHERE id = :item
			AND user_id = :user
			");

			$doneQuery->execute([
				'item' => $item, 
				'user' => $_SESSION['id']

			]);
		break;
	}
}

header('Location:TODO.php');