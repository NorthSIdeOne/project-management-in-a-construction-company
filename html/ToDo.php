<!DOCTYPE html>
<html lang="en">
<?php 
   session_start();
   $email = $_SESSION['login_user'];


  if(!isset($email))
  {
    header("Location: index.php");
  }

             $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
             $data = $connection->query(" SELECT FUNCTIE FROM ANGAJATI WHERE EMAIL= '$email'");
             $row = mysqli_fetch_assoc($data);
             $functie = $row['FUNCTIE'];





?>
<?php require '../php/todo_base_script.php';?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Korte</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/todo.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/full-width-pics.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

  <!-- Navigation -->
  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../html/HomePage.php">Korte</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../html/HomePage.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/Profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/Projects.php">Projects</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="../html/Teams.php">Teams</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="../html/Raports.php">Raports</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="../html/ToDo.php">To do</a>
          </li>
          <?php
            if($functie == "Manager" or $functie == "Admin")
              echo ' <li class="nav-item">
                      <a class="nav-link" href="../html/manage_tasks.php">Manage To Do</a>
                    </li>';
                    
          ?>
            <li class="nav-item">
            <a class="nav-link" href="../html/AdminPanel.php">Admin Panel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>To do list:</h4>
			<ul class="timeline">
				<?php
				for($i=0;$i<count($projects_name);$i++)
				{
				echo '<li>
					<div>
					<a target="_blank">Project: '.$projects_name[$i].'</a>
					
					<a  class="float-right"><font color="red">Deadline</font>: '.$deadline_task[$i].'</a>
					<br>
					<br>
					<p>Task: '.$tasks[$i].'</p>

					<div class="position-relative">

							<h5 class="font-weight-bold"> Status :  <a href="../php/todo_done_script.php?id='.$id_task[$i].'"> <button type="button" class="btn btn-warning">In progress</button></h5>
					</div>
				 </div>
				</li>';
				}
				?>
				
			</ul>
		</div>
	</div>

	<div class="row">
	

		<div class="col-md-6 offset-md-3">
			<h4>Done tasks:</h4>
			<ul class="timeline">
				<?php 
				for($i=0;$i<count($done_projects_name);$i++)
				{
				 echo'
				 	<li>
					<div>
					<a target="_blank">Project: '.$done_projects_name[$i].'</a>
					<a class="float-right"><font color="red">Deadline</font>:'.$done_deadline_task[$i].' </a>
					<br>
					<br>
					<a target="_blank">Task:'.$done_tasks[$i].'</a>
					
					<h5 class="font-weight-bold"> Status : <a href="../php/todo_undone_script.php?id='.$done_id_task[$i].'"> <button type="button" class="btn btn-success">Done</button></a></h5>
					
				 </div>';
				}
				?>
			</ul>
		</div>
	</div>

</div>


  
</body>

</html>

