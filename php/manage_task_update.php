<?php

 
    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	if(isset($_POST["delete"]))
	{
			$project = $_POST['project'];
			$task_proiect = explode(")",$project);
			$id_task = $task_proiect[0];
			$task_proiect = explode(":",$task_proiect[1]);
			$nume_proiect = $task_proiect[0];
			$old_task = $task_proiect[1];
			$task = $_POST['task'];
			if($task == NULL)
				$task = $task_proiect[1];
		
			$deadline = $_POST['event_date'];

			$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
 	
			$data = $connection->query(" SELECT ID_ECHIPA FROM ANGAJATI WHERE EMAIL= '$email'");
    		$row = mysqli_fetch_assoc($data);
    		$id_echipa = $row['ID_ECHIPA'];


    		$data1 = $connection->query(" SELECT ID_PROIECT FROM PROIECTE WHERE NUME_PROIECT= '$nume_proiect'");
    		$row1 = mysqli_fetch_assoc($data1);
    		$id_proiect = $row1['ID_PROIECT'];



    		$connection->query("DELETE FROM TO_DO_PROIECT WHERE ID_TASK = '$id_task'");

	}

	else
		if(isset($_POST["update"]))
		{	
			$project = $_POST['project'];
			$task_proiect = explode(")",$project);
			$id_task = $task_proiect[0];
			$task_proiect = explode(":",$task_proiect[1]);
			$nume_proiect = $task_proiect[0];
			$old_task = $task_proiect[1];
			$task = $_POST['task'];
			if($task == NULL)
				$task = $task_proiect[1];
		
			$deadline = $_POST['event_date'];

			$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
 	
			$data = $connection->query(" SELECT ID_ECHIPA FROM ANGAJATI WHERE EMAIL= '$email'");
    		$row = mysqli_fetch_assoc($data);
    		$id_echipa = $row['ID_ECHIPA'];


    		$data1 = $connection->query(" SELECT ID_PROIECT FROM PROIECTE WHERE NUME_PROIECT= '$nume_proiect'");
    		$row1 = mysqli_fetch_assoc($data1);
    		$id_proiect = $row1['ID_PROIECT'];



    		//print_r($task_proiect[0]);
			$connection->query("UPDATE  TO_DO_PROIECT SET TASK = '$task',DEADLINE = '$deadline' WHERE  ID_TASK = '$id_task'");
			
		}
		
	  header('Location:../html/manage_tasks.php?mt=0');

		exit();

?>