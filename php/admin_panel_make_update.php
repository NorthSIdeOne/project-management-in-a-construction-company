<?php

     session_start();
	 $email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	
	$email_id =$_GET['eml'];
	$delete=$_GET['delete'];
	
	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$email_up = $_POST['email'];;
	$cnp = $_POST['cnp'];
	$telefon= $_POST['telefon'];
	$salariu = $_POST['salariu'];
	$func = $_POST['functie'];
	$echipa = $_POST['echipa'];
	$is_admin = $_POST['is_admin'];
    $password = $_POST['password'];
   

     if($delete == true)
     {	
     	 $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
     	$connection->query("DELETE FROM AUTH WHERE EMAIL = '$email_id'");
     	echo "delete";
     	header('Location: ../html/AdminPanel.php?mt=0&up=0&eml='.$email_up.'');
     }
     elseif (isset($_POST['submit'])) {
     	
		 $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
		 $data = $connection->query(" SELECT ID_ECHIPA FROM ECHIPE WHERE NUME_ECHIPA = '$echipa'");
		 $row = mysqli_fetch_assoc($data);
		 $id_echipa = $row['ID_ECHIPA'];

		 
		 $connection->query(" UPDATE AUTH SET EMAIL = '$email_up',PASSWORD = '$password',NUME = '$nume',PRENUME = '$prenume',IS_ADMIN = '$is_admin' WHERE EMAIL = '$email_id'");
		 $connection->query(" UPDATE ANGAJATI SET CNP ='$cnp',TELEFON = '$telefon',SALARIU = '$salariu',FUNCTIE = '$func',ID_ECHIPA = '$id_echipa' WHERE EMAIL = '$email_up'");
		 header('Location: ../html/AdminPanel.php?mt=0&up=1&eml='.$email_up.'');
		 

		 

     }


exit();

?>