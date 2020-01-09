<?php

     session_start();
	 $email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$cnp = $_POST['cnp'];
	$telefon = $_POST['telefon'];
	$salariu = $_POST['salariu'];
	$functie = $_POST['functie'];
	$echipa = $_POST['echipa'];
	$email_ang = $nume.'.'.$prenume.''.$cnp[0].''.$cnp[3].''.$cnp[5]."@company.com";


	if(isset($_POST["submit"]))
	{	
		 $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
		 $data = $connection->query(" SELECT ID_ECHIPA FROM ECHIPE WHERE NUME_ECHIPA = '$echipa'");
		 $row = mysqli_fetch_assoc($data);
		 $id_echipa = $row['ID_ECHIPA'];

		 $connection->query(" INSERT INTO AUTH (EMAIL,PASSWORD,NUME,PRENUME,IS_ADMIN) VALUES ('$email_ang','1234','$nume','$prenume',0)");
		 $connection->query(" INSERT INTO ANGAJATI (EMAIL,CNP,TELEFON,SALARIU,FUNCTIE,ID_ECHIPA) VALUES ('$email_ang','$cnp','$telefon','$salariu','$functie','$id_echipa')");


	}
	
header('Location: ../html/AdminPanel.php?mt=1');
exit();

?>