<?php

 
    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	 $project = $_POST["nume_proiect"];
      $deadline = strval($_POST["event_date"]);
        $descriere =strval( $_POST["descriere"]);
        

 	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
 	
	$data = $connection->query(" SELECT ID_ECHIPA FROM ANGAJATI WHERE EMAIL= '$email'");
    $row = mysqli_fetch_assoc($data);

    $id_echipa = $row['ID_ECHIPA'];


 	$connection->query("INSERT INTO PROIECTE (NUME_PROIECT,DESCRIERE,DEADLINE) VALUES('$project','$descriere','$deadline')");
 	
 	$data1 = $connection->query(" SELECT ID_PROIECT FROM PROIECTE WHERE NUME_PROIECT = '$project' AND DESCRIERE = '$descriere' AND DEADLINE = '$deadline'");
    $row1 = mysqli_fetch_assoc($data1);

    $id_proiect = $row1['ID_PROIECT'];

    $connection->query("INSERT INTO PROIECTE_ECHIPE (ID_PROIECT,ID_ECHIPA) VALUES('$id_proiect','$id_echipa')");
 	


 	header('Location: ../html/Projects.php?mt=1');

?>