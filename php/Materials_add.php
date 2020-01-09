<?php

 
    session_start();
	$email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}


	    $material = explode(")",$_POST["material"]);

      $id_mat = $material[0];

     $stoc= $_POST["stoc"];
    
        
     $id_p = $_SESSION['id_p'];
   
     
      if(isset($_POST["add_material"]))
        {   
           $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");

            $data1 = $connection->query(" SELECT CANTITATE FROM MATERIALE_PROIECT WHERE ID_MATERIAL  = '$id_mat' AND ID_PROIECT = '$id_p'"); 
          if($data1->num_rows > 0 )
           {
              echo $stoc;
              $row1= mysqli_fetch_assoc($data1);
              $stoc_db_pr_update = intval($row1['CANTITATE']) + intval($stoc);
              
              $data = $connection->query(" SELECT STOC FROM MATERIALE WHERE ID_MATERIAL  = '$id_mat'");
              $row= mysqli_fetch_assoc($data);
              if(intval($row['STOC']) - intval($stoc) > 0)
              {
                $check = 0;
              $stoc_mat_db_update =intval($row['STOC']) - intval($stoc);

              $connection->query(" UPDATE MATERIALE SET STOC = '$stoc_mat_db_update' WHERE ID_MATERIAL  = '$id_mat'");
              $connection->query(" UPDATE MATERIALE_PROIECT SET CANTITATE = '$stoc_db_pr_update' WHERE ID_MATERIAL  = '$id_mat' AND ID_PROIECT = '$id_p'");
            }
            else
              $check = 1;

            if($check == 1)
              header('Location: ../html/edit_project.php?mt=2&check=1');
            else
              header('Location: ../html/edit_project.php?mt=2&check=0');

           }
           else
           {
             $data = $connection->query(" SELECT STOC FROM MATERIALE WHERE ID_MATERIAL  = '$id_mat'");
            $row= mysqli_fetch_assoc($data);
            $stoc_mat_db =intval($row['STOC']);


            if($stoc_mat_db - intval($stoc) > 0)
            {
              $check = 0;
              $stoc_mat_db_update = $stoc_mat_db - intval($stoc);

            
            $connection->query(" UPDATE MATERIALE SET STOC = '$stoc_mat_db_update' WHERE ID_MATERIAL  = '$id_mat'");
            $connection->query("INSERT INTO MATERIALE_PROIECT (ID_MATERIAL,ID_PROIECT,CANTITATE) VALUES('$id_mat','$id_p','$stoc')");

            }
            else 
              $check = 1;
            
           }
           

           
           if($check == 1)
              header('Location: ../html/edit_project.php?mt=2&check=1');
            else
              header('Location: ../html/edit_project.php?mt=2&check=0');
            
        }
        
      

  
 	
  exit();

?>