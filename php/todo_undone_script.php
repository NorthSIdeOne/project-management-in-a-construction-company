<?php
	session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}
	$task = $_GET['id'];

	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
	$data = $connection->query("UPDATE TO_DO_PROIECT SET STATUS_TASK = 0 WHERE ID_TASK = '$task'");
	header('Location: ../html/ToDo.php');

	
?>