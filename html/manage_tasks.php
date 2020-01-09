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
<?php require '../php/manage_task_start_script.php'; ?>

<?php

  $mt = $_GET['mt'];
  if($mt == 0)
    {
      $ut = "active"; 
      $at = "";
    }
  else
    {
      $at = "active"; 
      $ut = "";
    }
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Korte</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/full-width-pics.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="../lib/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap-datepicker.css" >

	<script>

			$(function() {

			$('.dates #usr1').datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});


		});
			</script>
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


  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Manage tasks</h1>
        <div class="list-group">
          <?php echo '<a href="../php/at_ut.php" class="list-group-item '.$ut.'">Update Task</a>'; ?>
          <?php echo' <a href="../php/ut_at.php" class="list-group-item '.$at.'">Add Task</a>'; ?>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <div class="card-body">

 <?php
 if($ut == "active")
 {
	echo '<form method = "POST" action = "../php/manage_task_update.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Select the project and task</label>
    <select name = "project" class="form-control" id="exampleFormControlSelect1">';
     for($i=0;$i<count($proiect_nume_task);$i++) {
      echo'<option>'.$id_task[$i].')'.$proiect_nume_task[$i].':'.$task[$i].'</option>';
    }
  echo '
  </select>
  </div>
   <div class="form-group">
  <div class="dates">
    <label>Choose Deadline</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" >
    </div>
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Change task</label>
    <textarea name = "task" class="form-control" id="messageTextBox" rows="3"></textarea>
    <div align = "right">
    <input name = "update" class="btn btn-primary" id="messageTextBox" type="submit" value="Update Task">
    <button name = "delete" class="btn btn-danger" type="submit">Delete Task</button>
 </div>
 
</form>';
}
else
{
 echo '<form method = "POST" action = "../php/manage_task_add.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Select the project</label>
    <select name ="project" class="form-control" id="exampleFormControlSelect1"> ';
       for($i=0;$i<count($nume_proiect);$i++) {
      echo'<option>'.$id_proiect[$i].':'.$nume_proiect[$i].'</option>';
    }
    
  echo '</select>
  </div> 
 
 <div class="dates">
 <div class="form-group">
    <label>Choose Deadline</label>
    <input name = "deadline" type="text" style="width:200px" class="form-control" id="usr1"  placeholder="YYYY-MM-DD"  >
    </div>
 </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"> Task</label>
    <textarea name = "task" class="form-control" id="messageTextBox" rows="3"></textarea>
    <div align = "right">
    <input  class="btn btn-primary" id="messageTextBox" type="submit" value="Add Task">
    
 </div>
 
</form>';
}
?>

    </div>
    </div>
  </div>

</body>

</html>

