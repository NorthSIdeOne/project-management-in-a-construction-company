<?php

 
  session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	  
     
      $proiect_full = explode(")",$_POST['project']);
      $proiect = $proiect_full[0];
      $raport = $_POST['raport'];
   

      if(isset($_POST["submit"]))
        {   
           $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
           
           $data = $connection->query(" SELECT ID_ANGAJAT FROM ANGAJATI WHERE EMAIL= '$email'");
            $row = mysqli_fetch_assoc($data);
            $id_angajat = $row['ID_ANGAJAT'];
          
            $connection->query(" INSERT INTO RAPORT_PROIECT (ID_PROIECT,ID_ANGAJAT,DESCRIERE) VALUES ('$proiect','$id_angajat','$raport')");
            
           header('Location: ../html/Raports.php?id=0');

            
        }
      elseif (isset($_POST["see_all"])) {

           
                       header('Location: ../html/Raports.php?id=1');

      }
        
      

  
 	
  exit();

?>