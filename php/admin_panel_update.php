<?php

     session_start();
	 $email = $_SESSION['login_user'];


	if(!isset($email))
	{
		header("Location: index.php");
	}

	
	$id =$_GET['id'];
	
	
	 

     $email_up = $id;




header('Location: ../html/AdminPanel.php?mt=0&up=1&eml='.$email_up.'');
exit();

?>