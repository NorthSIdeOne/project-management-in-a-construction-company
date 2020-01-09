<?php

     session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	 $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");

     $data = $connection->query(" SELECT ID_ECHIPA FROM ANGAJATI WHERE EMAIL = '$email'");
     $row= mysqli_fetch_assoc($data);
     $id_echipa = $row['ID_ECHIPA'];


     $id_proiecte = array();
     $data1 = $connection->query("SELECT ID_PROIECT FROM PROIECTE_ECHIPE WHERE ID_ECHIPA = '$id_echipa'");
     while($row1= mysqli_fetch_assoc($data1))
     {
     		array_push($id_proiecte,$row1['ID_PROIECT']);
     }

     $nume_proiecte = array();
     $data2 = $connection->query("SELECT NUME_PROIECT FROM PROIECTE WHERE ID_PROIECT IN (SELECT ID_PROIECT FROM PROIECTE_ECHIPE WHERE ID_ECHIPA = '$id_echipa')");
      while($row2= mysqli_fetch_assoc($data2))
     {
     		array_push($nume_proiecte,$row2['NUME_PROIECT']);
     }

     $proiecte = array_combine($id_proiecte, $nume_proiecte);



     $data3 = $connection->query("SELECT ID_ANGAJAT FROM ANGAJATI WHERE EMAIL = '$email'");
     $row3= mysqli_fetch_assoc($data3);
     $id_angajat = $row3['ID_ANGAJAT'];
	
		
     $rapoarte = array();
     $id_proiecte_rap = array();
     $id_rap = array();
     $data4 = $connection->query(" SELECT ID_RAPORT,ID_PROIECT,DESCRIERE FROM RAPORT_PROIECT WHERE ID_ANGAJAT = '$id_angajat'");
     while($row4= mysqli_fetch_assoc($data4))
     {
     	array_push($rapoarte,$row4['DESCRIERE']);
    	array_push($id_proiecte_rap,$row4['ID_PROIECT']);
 	    array_push($id_rap,$row4['ID_RAPORT']);
     } 

     $nume_proiecte_rap = array();

     foreach ($id_proiecte_rap as $id_pr) {
     
     $data5 = $connection->query("SELECT NUME_PROIECT FROM PROIECTE WHERE ID_PROIECT = '$id_pr'");
     $row5= mysqli_fetch_assoc($data5);
     array_push($nume_proiecte_rap,$row5['NUME_PROIECT']);
 	}


 	$id_rap_manager = array();
 	$id_angajat_manager = array();
 	$raport_manager = array();
 	 $data6 = $connection->query(" SELECT ID_RAPORT,ID_ANGAJAT,DESCRIERE FROM RAPORT_PROIECT WHERE ID_PROIECT IN (SELECT ID_PROIECT FROM PROIECTE_ECHIPE WHERE ID_ECHIPA = '$id_echipa')");
     while($row6= mysqli_fetch_assoc($data6))
     {
     	 array_push($id_rap_manager,$row6['ID_RAPORT']);
     	 array_push($id_angajat_manager,$row6['ID_ANGAJAT']);
     	 array_push($raport_manager,$row6['DESCRIERE']);
     }


     $nume_ang_manager = array();
     foreach ($id_angajat_manager as $id_ang) {
     
     $data7 = $connection->query(" SELECT NUME,PRENUME FROM AUTH WHERE EMAIL IN (SELECT EMAIL FROM ANGAJATI WHERE ID_ANGAJAT = '$id_ang')");
     while($row7= mysqli_fetch_assoc($data7))
		{
			 array_push($nume_ang_manager,$row7['NUME'].' '.$row7['PRENUME']);

		

		}
	
     }

		

		$id_proiecte_manager = array();

		foreach ($id_angajat_manager as $id_a) {
		$data8 = $connection->query("SELECT ID_PROIECT FROM RAPORT_PROIECT WHERE ID_ANGAJAT = $id_a");
		$row8= mysqli_fetch_assoc($data8);
		
		 	 array_push($id_proiecte_manager,$row8['ID_PROIECT']);

		 

	}
		
	$nume_proiecte_manager = array();
	foreach ($id_proiecte_manager as $id_p) {
		$data9 = $connection->query("SELECT NUME_PROIECT FROM PROIECTE WHERE ID_PROIECT = $id_p");
		$row9= mysqli_fetch_assoc($data9);
		
		 	 array_push($nume_proiecte_manager,$row9['NUME_PROIECT']);

	}

/*	print_r($id_rap_manager);
	print_r($nume_proiecte_manager);
	print_r($nume_ang_manager);
	print_r($raport_manager);
	
*/

?>