<?php

	session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
	$data = $connection->query(" SELECT NUME,PRENUME ,IS_ADMIN FROM AUTH WHERE EMAIL= '$email'");
    $row = mysqli_fetch_assoc($data);

    $NUME = $row['NUME'];
    $PRENUME = $row['PRENUME'];
	 $ADMIN = $row['IS_ADMIN'];

    $data2 = $connection->query(" SELECT SALARIU,FUNCTIE FROM ANGAJATI WHERE EMAIL= '$email'");
    $row2 = mysqli_fetch_assoc($data2);

    $SALARIU  = $row2['SALARIU'];
    $FUNCTIE = $row2['FUNCTIE'];




	?>
