<?php

	
	session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
	$data = $connection->query(" SELECT ID_ECHIPA FROM ANGAJATI WHERE EMAIL = '$email'");
    $row = mysqli_fetch_assoc($data);
    $id_echipa = $row['ID_ECHIPA'];


    $id_proiect = $_SESSION['id_p'];



    $data1 = $connection->query(" SELECT NUME_PROIECT, DESCRIERE ,DEADLINE FROM PROIECTE WHERE ID_PROIECT = '$id_proiect'");
    $row1= mysqli_fetch_assoc($data1);

    $nume_proiect = $row1['NUME_PROIECT'];
    $descriere = $row1['DESCRIERE'];
    $deadline = substr($row1['DEADLINE'],0,10);


    $nume_utilaje = array();
    $id_utilaj = array();
	$data1 = $connection->query(" SELECT ID_UTILAJ, NUME_UTILAJ  FROM UTILAJE");
    while($row1= mysqli_fetch_assoc($data1))
    {
    	array_push($id_utilaj, $row1['ID_UTILAJ']);
    	array_push($nume_utilaje,$row1['NUME_UTILAJ']);
    }

    $utilaje = array_combine($id_utilaj,$nume_utilaje);



    $id_ut_proiect = array();

    $data2 = $connection->query(" SELECT ID_UTILAJ  FROM UTILAJE_PROIECT WHERE ID_PROIECT ='$id_proiect'");
 	 while($row2= mysqli_fetch_assoc($data2))
    {
    	array_push($id_ut_proiect, $row2['ID_UTILAJ']);
    }

    $nume_ut_proiect = array();
    $data_start_u = array();
    $data_finish_u = array();
    foreach ($id_ut_proiect as $id_u) {
   
    $data3 = $connection->query(" SELECT DATA_START,DATA_FINISH FROM UTILAJE_PROIECT WHERE ID_UTILAJ  = '$id_u' AND ID_PROIECT = '$id_proiect'");
 	
 	$row3= mysqli_fetch_assoc($data3);
    
    	
    	array_push($data_start_u, substr($row3['DATA_START'],0,10));
    	array_push($data_finish_u, substr($row3['DATA_FINISH'],0,10));

    
}
 foreach ($id_ut_proiect as $id_u) {

	$data4 = $connection->query(" SELECT NUME_UTILAJ FROM UTILAJE WHERE ID_UTILAJ  = '$id_u'");
 	$row4= mysqli_fetch_assoc($data4);

    array_push($nume_ut_proiect, $row4['NUME_UTILAJ']);
}
    $utilaje_proiect = array_combine($id_ut_proiect, $nume_ut_proiect);
    $rezervare_ut = array_combine($data_start_u, $data_finish_u);



    $id_mat_pr = array();
    $cantitate_pr = array();
    $data4 = $connection->query(" SELECT ID_MATERIAL,CANTITATE FROM MATERIALE_PROIECT WHERE ID_PROIECT  = '$id_proiect'");
 	while($row4= mysqli_fetch_assoc($data4))
 	{	
 		array_push($id_mat_pr,$row4['ID_MATERIAL']);
 		array_push($cantitate_pr,$row4['CANTITATE']);
 	}

 	$nume_mat_proiect = array();
 	$data5 = $connection->query(" SELECT NUME_MATERIAL FROM MATERIALE WHERE ID_MATERIAL IN (SELECT ID_MATERIAL FROM MATERIALE_PROIECT WHERE ID_PROIECT  = '$id_proiect')");
 	while($row5= mysqli_fetch_assoc($data5))
 	{
 		array_push($nume_mat_proiect,$row5['NUME_MATERIAL']);

 	}

 	$id_mat_all=array();
 	$nume_mat_all = array();
 	$data6 = $connection->query(" SELECT ID_MATERIAL,NUME_MATERIAL FROM MATERIALE ");
 	while($row6= mysqli_fetch_assoc($data6))
 	{
 		array_push($id_mat_all,$row6['ID_MATERIAL']);
 		array_push($nume_mat_all,$row6['NUME_MATERIAL']);


 	}

 	$mat_all = array_combine($id_mat_all, $nume_mat_all);


?>