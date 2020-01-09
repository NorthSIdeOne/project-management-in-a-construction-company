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
	$data = $connection->query(" SELECT ID_ECHIPA  FROM ANGAJATI WHERE EMAIL = '$email'");
    $row = mysqli_fetch_assoc($data);
  	$id_echipa = $row['ID_ECHIPA'];
  	


  	$emails = array();
  	$telefon = array();
  	$functie = array();
  	$data1 = $connection->query(" SELECT EMAIL,TELEFON,FUNCTIE FROM ANGAJATI WHERE ID_ECHIPA = '$id_echipa'");
    
    while($row1 = mysqli_fetch_assoc($data1))
    {
    	array_push($emails,$row1['EMAIL']);
    	array_push($telefon,$row1['TELEFON']);
    	array_push($functie,$row1['FUNCTIE']);
    }

  	$names = array();
    foreach ($emails as $value) {	
  	$data2 = $connection->query(" SELECT NUME,PRENUME FROM AUTH WHERE EMAIL = '$value'");
  	$row2 = mysqli_fetch_assoc($data2);
    $nume = $row2['NUME'];
    $prenume = $nume ." ".$row2['PRENUME'];
	
    array_push($names,$prenume);
    $nume = "";
    $prenume = "";
	}
    
   $full_description = array_combine($names, $telefon);//Nume +  telefon
   $position = array_combine($names, $functie);



    $data3 = $connection->query(" SELECT NUME_ECHIPA  FROM ECHIPE WHERE ID_ECHIPA = '$id_echipa'");
    $row3 = mysqli_fetch_assoc($data3);

    $nume_e = $row3['NUME_ECHIPA'];


    
	
	?>
