<?php

 
    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	 $project_name = $_POST["nume_proiect"];
     $deadline = $_POST["event_date"];
     $descriere =$_POST["descriere"];
        
     $id_p = $_SESSION['id_p'];

   

   if(isset($_POST["delete"]))
    {
     $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
     $connection->query("DELETE FROM PROIECTE_ECHIPE  WHERE ID_PROIECT = '$id_p'");
     $connection->query("DELETE FROM RAPORT_PROIECT  WHERE ID_PROIECT = '$id_p'");
     $connection->query("DELETE FROM TO_DO_PROIECT  WHERE ID_PROIECT = '$id_p'");
     $connection->query("DELETE FROM UTILAJE_PROIECT  WHERE ID_PROIECT = '$id_p'");
     $connection->query("DELETE FROM MATERIALE_PROIECT  WHERE ID_PROIECT = '$id_p'");
     $connection->query("DELETE FROM PROIECTE  WHERE ID_PROIECT = '$id_p'");
     header('Location: ../html/Projects.php?mt=0');


    }

    else
        if(isset($_POST["update"]))
        {   
           $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
           echo $project_name.' '.$deadline.' '.$descriere.' '.$id_p;
           $connection->query("UPDATE  PROIECTE SET NUME_PROIECT = '$project_name', DESCRIERE = '$descriere' , DEADLINE = '$deadline'  WHERE  ID_PROIECT = '$id_p' ");
           header('Location: ../html/edit_project.php?mt=0');

            
        }
        
      

  
 	
  exit();

?>