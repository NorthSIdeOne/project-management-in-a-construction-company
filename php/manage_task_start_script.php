<?php

    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	$connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
	$data = $connection->query(" SELECT ID_ECHIPA  FROM ANGAJATI WHERE EMAIL = '$email'");
	$row = mysqli_fetch_assoc($data);

	$id_echipa = $row['ID_ECHIPA'];

	$id_proiect = array();
	$nume_proiect = array();
	$data1 = $connection->query(" SELECT ID_PROIECT  FROM PROIECTE_ECHIPE WHERE ID_ECHIPA = (SELECT ID_ECHIPA  FROM ANGAJATI WHERE EMAIL = '$email')"); //query complex
	while($row1 = mysqli_fetch_assoc($data1))
	{
		array_push($id_proiect,$row1['ID_PROIECT']);
	}


	/*foreach ($id_proiect as $id_p) 
	{
	$data2 = $connection->query(" SELECT NUME_PROIECT  FROM PROIECTE WHERE ID_PROIECT= '$id_p'");
 	$row2 = mysqli_fetch_assoc($data2);
 	array_push($nume_proiect,$row2['NUME_PROIECT']);
   }
   */

   	$data2 = $connection->query(" SELECT NUME_PROIECT  FROM PROIECTE WHERE ID_PROIECT IN (SELECT ID_PROIECT  FROM PROIECTE_ECHIPE WHERE ID_ECHIPA = (SELECT ID_ECHIPA  FROM ANGAJATI WHERE EMAIL = '$email'))"); // //query complex
 	while($row2 = mysqli_fetch_assoc($data2))
 	 {
 	 	array_push($nume_proiect,$row2['NUME_PROIECT']);
 	}


   $task = array();
   $proiect_id_task = array();
 

	/*foreach ($id_proiect as $np)
	 {
			
		$data3 = $connection->query("SELECT TASK FROM TO_DO_PROIECT WHERE ID_PROIECT = '$np' AND ID_ECHIPA = '$id_echipa'");
		while($row3 = mysqli_fetch_assoc($data3))
		{
			array_push($proiect_id_task, $np);
			array_push($task, $row3['TASK']);
		}
	}
	*/

	
		$id_task = array();
		$data3 = $connection->query("SELECT ID_TASK,TASK ,ID_PROIECT FROM TO_DO_PROIECT WHERE ID_PROIECT IN (SELECT ID_PROIECT  FROM PROIECTE_ECHIPE WHERE ID_ECHIPA = (SELECT ID_ECHIPA  FROM ANGAJATI WHERE EMAIL = '$email')) AND ID_ECHIPA IN (SELECT ID_ECHIPA  FROM ANGAJATI WHERE EMAIL = '$email')"); //query complex
		while($row3 = mysqli_fetch_assoc($data3))
		{	
			array_push($id_task,$row3['ID_TASK']);
			array_push($proiect_id_task, $row3['ID_PROIECT']);
			array_push($task, $row3['TASK']);
		}
	



	$proiect_nume_task = array();
	foreach ($proiect_id_task as  $pit) {

		$data4 = $connection->query("SELECT NUME_PROIECT FROM PROIECTE WHERE ID_PROIECT = '$pit'");
		$row4 = mysqli_fetch_assoc($data4);
		array_push($proiect_nume_task, $row4['NUME_PROIECT']);
	}

	
	
	


?>