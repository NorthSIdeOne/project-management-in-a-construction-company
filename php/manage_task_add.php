<?php

 
    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	    $project = $_POST["project"];
       	$deadline = strval($_POST["deadline"]);
        $task =strval( $_POST["task"]);
        $id_proiect = explode(":",$project);
        $id_proiect = $id_proiect[0];

 	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
 	
	$data = $connection->query(" SELECT ID_ECHIPA FROM ANGAJATI WHERE EMAIL= '$email'");
    $row = mysqli_fetch_assoc($data);

    $id_echipa = $row['ID_ECHIPA'];


 	$connection->query("INSERT INTO TO_DO_PROIECT (ID_PROIECT,ID_ECHIPA,TASK,DEADLINE) VALUES('$id_proiect','$id_echipa','$task','$deadline')");
 	
 	
 	header('Location: ../html/manage_tasks.php?mt=1');

?>