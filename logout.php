<?php
	require_once 'app/init.php';
	

	unset($_SESSION['id']);

	header('Location:index.php');