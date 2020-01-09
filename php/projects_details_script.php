<?php

	session_start();
	$email = $_SESSION['login_user'];

	$project_name = $_GET['id'];

	if(!isset($email))
	{
		header("Location: index.php");
	}

	

	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
	$data = $connection->query(" SELECT ID_PROIECT,DEADLINE,DESCRIERE FROM PROIECTE WHERE NUME_PROIECT ='$project_name'");
    $row = mysqli_fetch_assoc($data);
 
    $deadline =substr($row['DEADLINE'],0,10);
    $id_proiect = $row['ID_PROIECT'];
    $descriere = $row['DESCRIERE'];
    $_SESSION['id_p'] = $id_proiect;

    $id_materiale = array();
    $cantitate    = array();
    $nume_material = array();
    //----------------------------------------------MATERIALE---------------------------------------------------------
    $data1 = $connection->query(" SELECT ID_MATERIAL,CANTITATE FROM MATERIALE_PROIECT WHERE ID_PROIECT ='$id_proiect'");
    while($row1 = mysqli_fetch_assoc($data1))
    {
    	array_push($id_materiale,$row1['ID_MATERIAL']);
    	array_push($cantitate,$row1['CANTITATE']);

    }


    foreach ($id_materiale as $id_mat) {
     $data2 = $connection->query(" SELECT NUME_MATERIAL FROM MATERIALE WHERE ID_MATERIAL ='$id_mat'");
     $row2 = mysqli_fetch_assoc($data2);

     array_push($nume_material,$row2['NUME_MATERIAL']);

    }

    $materiale =  array_combine($nume_material,$cantitate); //nume materiale + cantitate pt acest proiect

    //----------------------------------------------UTILAJE---------------------------------------------------------

    $id_utilaje = array();
    $data_start = array();
    $data_finish = array();
    $nume_utilaje = array();
     $data3 = $connection->query(" SELECT ID_UTILAJ,DATA_START,DATA_FINISH FROM UTILAJE_PROIECT WHERE ID_PROIECT ='$id_proiect'");
     while($row3 = mysqli_fetch_assoc($data3))
     {
     	array_push($id_utilaje,$row3['ID_UTILAJ']);
     	array_push($data_start,substr($row3['DATA_START'],0,10));
     	array_push($data_finish,substr($row3['DATA_FINISH'],0,10));
     }

     $rezervare_utilaj = array_combine($data_start, $data_finish); //Data de start si de finish pt fiecare utilaj folosit in acest proiect
    foreach ($id_utilaje as $id_ut) {
 	$data4 = $connection->query(" SELECT NUME_UTILAJ FROM UTILAJE WHERE ID_UTILAJ ='$id_ut'");
 	$row4 = mysqli_fetch_assoc($data4);
 	array_push($nume_utilaje,$row4['NUME_UTILAJ']);
 	}

 	 $utilaje =  array_combine($nume_utilaje,$data_start); //ID utilaj + numele utilajului folosit pt acest proiect


 	$id_echipe = array();
 	$echipe = array();
 	$data5 = $connection->query(" SELECT ID_ECHIPA FROM PROIECTE_ECHIPE WHERE ID_PROIECT ='$id_proiect'");
 	 while($row5 = mysqli_fetch_assoc($data5))
 	 {	
 	 	array_push($id_echipe,$row5['ID_ECHIPA']);
 	 }
 	foreach ($id_echipe as $id_e) {
 		
 
	$data6 = $connection->query(" SELECT NUME_ECHIPA FROM ECHIPE WHERE ID_ECHIPA ='$id_e'");
	 $row6 = mysqli_fetch_assoc($data6);
 	 	
 	 array_push($echipe,$row6['NUME_ECHIPA']);
 	}	 



	?>
