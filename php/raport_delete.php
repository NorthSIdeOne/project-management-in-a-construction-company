<?php

     session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	$id = $_GET['id'];

	 $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");

	 $connection->query("DELETE FROM RAPORT_PROIECT WHERE ID_RAPORT = '$id'");

	 header('Location: ../html/Raports.php?mt=1');

?>