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


    $projects = array();
    $data1 = $connection->query(" SELECT DISTINCT ID_PROIECT FROM TO_DO_PROIECT WHERE ID_ECHIPA = '$id_echipa' ORDER BY ID_PROIECT");
    while($row1 = mysqli_fetch_assoc($data1))
    {
    	array_push($projects,$row1['ID_PROIECT']);
    }

    $projects_id_for_tasks = array();
    $tasks = array();
    $status_task = array();
    $deadline_task = array();
    $id_task = array();
    foreach ($projects as $p) 
    {
    $data2 = $connection->query(" SELECT ID_TASK,TASK,STATUS_TASK,DEADLINE FROM TO_DO_PROIECT WHERE ID_PROIECT = '$p' AND ID_ECHIPA = '$id_echipa' AND STATUS_TASK = 0 ORDER BY DEADLINE");
	while($row2 = mysqli_fetch_assoc($data2))
	{
		array_push($projects_id_for_tasks,$p);
		array_push($tasks,$row2['TASK']);
		array_push($status_task,strval($row2['STATUS_TASK']));
		array_push($deadline_task,substr($row2['DEADLINE'],0,10));
		array_push($id_task,$row2['ID_TASK']);
	}
	}

	$projects_name = array();
	 foreach ($projects_id_for_tasks as $pr)  {
	
	$data3 = $connection->query(" SELECT NUME_PROIECT FROM PROIECTE WHERE ID_PROIECT = '$pr'");
	$row3 = mysqli_fetch_assoc($data3);
	array_push($projects_name,$row3['NUME_PROIECT']); //Numele proiectelor pt fiecare task in ordine
   }

//--------------------------------Done Tasks-----------------------------------------------

   $done_projects_id  = array();
   $done_tasks		  = array();
   $done_status_task = array();
   $done_deadline_task = array();
   $done_id_task = array();
   foreach ($projects as $pd) 
    {
    $data4 = $connection->query(" SELECT ID_TASK,TASK,STATUS_TASK,DEADLINE FROM TO_DO_PROIECT WHERE ID_PROIECT = '$pd' AND ID_ECHIPA = '$id_echipa' AND STATUS_TASK = 1 ORDER BY DEADLINE");
	while($row4 = mysqli_fetch_assoc($data4))
	{
		array_push($done_projects_id,$pd);
		array_push($done_tasks,$row4['TASK']);
		array_push($done_status_task,strval($row4['STATUS_TASK']));
		array_push($done_deadline_task,substr($row4['DEADLINE'],0,10));
		array_push($done_id_task,$row4['ID_TASK']);
	}
	}

	$done_projects_name = array();
	 foreach ($done_projects_id as $pdd)  {
	
	$data5 = $connection->query(" SELECT NUME_PROIECT FROM PROIECTE WHERE ID_PROIECT = '$pdd'");
	$row5 = mysqli_fetch_assoc($data5);
	array_push($done_projects_name,$row5['NUME_PROIECT']); //Numele proiectelor pt fiecare task in ordine
   }

	?>
