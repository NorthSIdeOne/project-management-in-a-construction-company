<?php

     session_start();
	 $email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	
	$id_mat =$_GET['id'];
	
	$stoc = $_POST['add_stoc_mat'];

	
	 $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");


   	$connection->query("UPDATE MATERIALE SET STOC = '$stoc' WHERE ID_MATERIAL = '$id_mat'");




header('Location: ../html/AdminPanel.php?mt=4');
exit();

?>