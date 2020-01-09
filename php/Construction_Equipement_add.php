<?php

 
    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	   $equipment = explode(")",$_POST["eq"]);
     $eq_id = $equipment[0];
     $start= $_POST["start"];
     $finish =$_POST["end"];
        
     $id_p = $_SESSION['id_p'];

   

      if(isset($_POST["add_reservation"]))
        {   
           $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
           
           $connection->query("INSERT INTO UTILAJE_PROIECT (ID_UTILAJ,ID_PROIECT,DATA_START,DATA_FINISH) VALUES('$eq_id','$id_p','$start','$finish')");
           

           echo $eq_id.' '.$id_p.' '.$start.' '.$finish;

           header('Location: ../html/edit_project.php?mt=1');

            
        }
        
      

  
 	
  exit();

?>