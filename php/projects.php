<?php

	session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	$nume_p = array();
	$descriere = array();

	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
	$data = $connection->query(" SELECT NUME_PROIECT ,DESCRIERE FROM PROIECTE WHERE ID_PROIECT IN (SELECT ID_PROIECT FROM PROIECTE_ECHIPE WHERE ID_ECHIPA IN (SELECT ID_ECHIPA FROM ANGAJATI WHERE EMAIL ='$email'))");
    while($row = mysqli_fetch_assoc($data))
    {
    	array_push($nume_p, $row['NUME_PROIECT']);
    	array_push($descriere, $row['DESCRIERE']);
    }
    $projects = array_combine($nume_p, $descriere);
    
	?>
