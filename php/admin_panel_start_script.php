<?php

     session_start();
	 $email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	$id = $_GET['id'];

	 $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");


	 $nume_prenume = array();
	 $cnp = array();
	 $telefon = array();
	 $emails = array();
	 $salariu = array();
	 $func = array();
	 $id_echipa = array();
	 $id_angajat = array();
     $data = $connection->query("SELECT * FROM AUTH AT INNER JOIN ANGAJATI A ON AT.EMAIL = A.EMAIL");
     while($row= mysqli_fetch_assoc($data))
     {
     	array_push($nume_prenume,$row['NUME'].' '.$row['PRENUME']);
     	array_push($cnp,$row['CNP']);
     	array_push($telefon,$row['TELEFON']);
     	array_push($emails,$row['EMAIL']);
     	array_push($salariu,$row['SALARIU']);
     	array_push($func,$row['FUNCTIE']);
     	array_push($id_echipa,$row['ID_ECHIPA']);
     	array_push($id_angajat,$row['ID_ANGAJAT']);

     }

     $nume_echipa =array();
     foreach ($id_angajat as $id_a) {
    
     $data1 = $connection->query("SELECT NUME_ECHIPA FROM ECHIPE WHERE ID_ECHIPA IN (SELECT ID_ECHIPA FROM ANGAJATI WHERE ID_ANGAJAT = '$id_a')");
     $row1= mysqli_fetch_assoc($data1);

    	array_push($nume_echipa,$row1['NUME_ECHIPA']);
    }

    $nume_echipe_option = array();
     $data2 = $connection->query("SELECT NUME_ECHIPA FROM ECHIPE");
      while($row2= mysqli_fetch_assoc($data2))
      {
      	array_push($nume_echipe_option,$row2['NUME_ECHIPA']);
      }


    //print_r($nume_echipa);
     $eml =$_GET['eml'];
	  $nume_up = array();
	 $prenume_up = array();
	 $cnp_up = array();
	 $telefon_up = array();
	 $salariu_up = array();
	 $func_up = array();
	 $id_echipa_up = array();
	 $id_angajat_up = array();
     $email_up = $eml;
	 
     $data1 = $connection->query("SELECT * FROM AUTH AU INNER JOIN ANGAJATI A ON AU.EMAIL = A.EMAIL WHERE AU.EMAIL = '$eml'");
     $row12= mysqli_fetch_assoc($data1);
     	array_push($nume_up,$row12['NUME']);
     	array_push($prenume_up,$row12['PRENUME']);
        array_push($cnp_up,$row12['CNP']);
     	array_push($telefon_up,$row12['TELEFON']);
     	
     	array_push($salariu_up,$row12['SALARIU']);
     	array_push($func_up,$row12['FUNCTIE']);
     	array_push($id_echipa_up,$row12['ID_ECHIPA']);
     	array_push($id_angajat,$row12['ID_ANGAJAT']);
     	$is_admin = $row12['IS_ADMIN'];
     	$password = $row12['PASSWORD'];

    

     $id_echipa_u = $id_echipa_up[0];
     $data11 = $connection->query("SELECT NUME_ECHIPA FROM ECHIPE WHERE ID_ECHIPA = '$id_echipa_u'");
     $row11= mysqli_fetch_assoc($data11);
     $nume_echipa_up = $row11['NUME_ECHIPA'];
     

   
   	$nume_proj = array();
   	$descriere_proj= array();
   	$deadline_proj = array();
   	$nume_echipa_proj = array();

    $data13 = $connection->query("SELECT P.NUME_PROIECT,P.DESCRIERE,P.DEADLINE,E.NUME_ECHIPA FROM PROIECTE P LEFT JOIN PROIECTE_ECHIPE PE ON P.ID_PROIECT = PE.ID_PROIECT LEFT JOIN ECHIPE E ON PE.ID_ECHIPA = E.ID_ECHIPA ");
     while($row13= mysqli_fetch_assoc($data13))
     {
     	array_push($nume_proj, $row13['NUME_PROIECT']);
     	array_push($descriere_proj, $row13['DESCRIERE']);
     	array_push($deadline_proj, $row13['DEADLINE']);
     	array_push($nume_echipa_proj, $row13['NUME_ECHIPA']);	
     }


     $rap_nume_proiect = array();
     $rap_descriere= array();
     $id_rap = array();
      $data14 = $connection->query("SELECT R.ID_RAPORT, R.DESCRIERE, P.NUME_PROIECT FROM RAPORT_PROIECT R LEFT JOIN PROIECTE P ON P.ID_PROIECT = R.ID_PROIECT ");
     while($row14= mysqli_fetch_assoc($data14))
     {
     	array_push( $rap_nume_proiect, $row14['NUME_PROIECT']);
     	array_push($rap_descriere, $row14['DESCRIERE']);
     	array_push($id_rap, $row14['ID_RAPORT']);	
     }


     $nume_ang_rap = array();
      $data15 = $connection->query("SELECT AUT.NUME,AUT.PRENUME FROM RAPORT_PROIECT R LEFT JOIN ANGAJATI A ON A.ID_ANGAJAT = R.ID_ANGAJAT LEFT JOIN AUTH AUT ON AUT.EMAIL = A.EMAIL");
     while($row15= mysqli_fetch_assoc($data15))
     {
     	array_push($nume_ang_rap, $row15['NUME'].' '.$row15['PRENUME']);	
     }


     $id_mat = array();
     $nume_mat = array();
     $stoc_mat = array();
     $data16 = $connection->query("SELECT * FROM MATERIALE ");
     while($row16= mysqli_fetch_assoc($data16))
     {
     	array_push($id_mat, $row16['ID_MATERIAL']);
     	array_push($nume_mat, $row16['NUME_MATERIAL']);
     	array_push($stoc_mat, $row16['STOC']);
     }

     $id_ut = array();
     $nume_ut = array();

      $data17 = $connection->query("SELECT * FROM UTILAJE ");
     while($row17= mysqli_fetch_assoc($data17))
     {
     	array_push($id_ut, $row17['ID_UTILAJ']);
     	array_push($nume_ut, $row17['NUME_UTILAJ']);
     	
     }
?>