<?php

 
    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	    $utilaj = explode(")",$_POST["utilaj"]);
      $id_ut = $utilaj[0];

     $start= $_POST["start"];
     $end =$_POST["end"];
        
     $id_p = $_SESSION['id_p'];

   

   if(isset($_POST["delete"]))
    {
      
      $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
      $connection->query("DELETE FROM UTILAJE_PROIECT  WHERE ID_PROIECT = '$id_p' AND ID_UTILAJ = '$id_ut' ");
       header('Location: ../html/edit_project.php?mt=1');
    }

    else
        if(isset($_POST["update"]))
        {   
           $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
           $connection->query("UPDATE  UTILAJE_PROIECT  SET DATA_START = '$start',DATA_FINISH = '$end' WHERE ID_PROIECT = '$id_p' AND ID_UTILAJ = '$id_ut' ");
           header('Location: ../html/edit_project.php?mt=1');

        }
        
      

  
 	
  exit();

?>