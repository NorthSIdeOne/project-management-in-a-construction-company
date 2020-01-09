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

   


   if(isset($_POST["delete"]))
    {
      
      $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");

            $data = $connection->query(" SELECT STOC FROM MATERIALE WHERE ID_MATERIAL  = '$id_mat'");
            $row= mysqli_fetch_assoc($data);
            $stoc_mat_db =intval($row['STOC']);

            $stoc_mat_db_update = $stoc_mat_db + intval($delete_q);
            $connection->query(" UPDATE MATERIALE SET STOC = '$stoc_mat_db_update' WHERE ID_MATERIAL  = '$id_mat'");
            $connection->query(" DELETE FROM MATERIALE_PROIECT  WHERE ID_MATERIAL  = '$id_mat' AND ID_PROIECT = '$id_p'");


       header('Location: ../html/edit_project.php?mt=2');
    }

    else
        if(isset($_POST["update"]))
        {   

           $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");

            $data = $connection->query(" SELECT STOC FROM MATERIALE WHERE ID_MATERIAL  = '$id_mat'");
            $row= mysqli_fetch_assoc($data);
            $stoc_mat_db =intval($row['STOC']);


            if($stoc_mat_db - intval($stoc) > 0)
            {
              $check = 0;
              $stoc_mat_db_update = $stoc_mat_db - intval($stoc);
              $data1 = $connection->query(" SELECT CANTITATE FROM MATERIALE_PROIECT WHERE ID_MATERIAL  = '$id_mat' AND ID_PROIECT = '$id_p'");
             $row1= mysqli_fetch_assoc($data1);
             $stoc_mat_pr_update = intval($row1['CANTITATE']) + intval($stoc);

            $connection->query(" UPDATE MATERIALE SET STOC = '$stoc_mat_db_update' WHERE ID_MATERIAL  = '$id_mat'");
            $connection->query(" UPDATE MATERIALE_PROIECT SET CANTITATE = '$stoc_mat_pr_update' WHERE ID_MATERIAL  = '$id_mat' AND ID_PROIECT = '$id_p'");

            }
            else 
              $check = 1;
           
          // $connection->query("UPDATE  UTILAJE_PROIECT  SET DATA_START = '$start',DATA_FINISH = '$end' WHERE ID_PROIECT = '$id_p' AND ID_UTILAJ = '$id_ut' ");
            if($check == 1)
              header('Location: ../html/edit_project.php?mt=2&check=1');
            else
              header('Location: ../html/edit_project.php?mt=2&check=0');



        }
        
      

  
  
  exit();

?>