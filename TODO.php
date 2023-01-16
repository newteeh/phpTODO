<?php
	require_once 'app/init.php';
	if (!empty($_SESSION['id'])) :

	$itemsQuery = $db->prepare("
		SELECT id, description, status
		FROM tasks
		WHERE user_id = :user
	");

	$itemsQuery->execute([
		'user' => $_SESSION['id']
	]);

	$items = $itemsQuery->rowCount() ? $itemsQuery : [];


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>To do</title>

		<link rel="stylesheet" href="css/main.css">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
	</head>

	<body>
		<div class="list">
			<h1 class="header">To do. <a href="logout.php"><img src="/img/logout-svgrepo-com.svg" alt=""></a></h1>

			<?php if (!empty($items)) : ?>
				<ul class="items">
					<?php foreach ($items as $item) : ?>
						<li>
							<span class="item <?php echo $item['status'] ? ' done' : '' ?>"><?php echo $item['description']; ?></span>
							<?php if (!$item['status']) : ?>
								<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php else : ?>
				<p>You haven't added any tasks yet</p>
			<?php endif; ?>
			<form class="item-add" action="add.php" method="post">
				<input type="text" name="name" placeholder="Type task here." class="input" autocomplete="off" required>
				<input type="submit" value="Add" class="submit">
				<div class="contorol-buttons">
					<button class="remove"><a href="remove-all.php">Remove all</a></button>
					<button class="ready"><a href="ready-all.php">Ready all</a></button>
				</div>
			</form>
		</div>
	</body>

	</html>
<?php else : ?>
	<?php header('Location:index.php');?>
<?php endif; ?>