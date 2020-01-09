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


  $mt = $_GET['mt'];
  if($mt == 0)
    {
      $pt = "active"; 
      $at = "";
    }
  else
    {
      $at = "active"; 
      $pt = "";
    }


?>
<?php require '../php/projects.php'; ?>
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



  <?php 
if($functie == "Manager" or $functie == "Admin")
{
  if($pt == "active")
{
  echo ' <div class="container">
  <!-- Page Heading -->   
  </h1>
  <div class = "float-right">

  </div>
  <div class = "row">
  <div class="col-lg-3">
        <h2 class="my-4">Manage projects</h2>
        <div class="list-group">';
          echo '<a href="../php/project_pt_at.php" class="list-group-item '.$pt.'">All projects</a>';
          echo' <a href="../php/project_at_pt.php" class="list-group-item '.$at.'">Add projects</a>';

   echo'<br>
        <br>     
        </div>
      </div>
  </div>
  <div class="row">';

    

  foreach ($projects as $key => $value) {
  echo' <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="../img/project.jpg" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="../html/projects_details.php?id='.$key.'"> '.$key.' </a>
          </h4>
        </div>
      </div>
    </div>';
  }
    
   

echo '</div>';
}
else
   if($at == "active")
   {
    echo ' <div class="container">
  <!-- Page Heading -->   
  </h1>
 
  <div class = "row">
  <div class="col-lg-3">
        <h2 class="my-4">Manage projects</h2>
        <div class="list-group">';
          echo '<a href="../php/project_pt_at.php" class="list-group-item '.$pt.'">All projects</a>';
          echo' <a href="../php/project_at_pt.php" class="list-group-item '.$at.'">Add projects</a>';

   echo'    
        </div>
      </div>
  <div class="col-lg-9">

        <div class="card mt-4">
          <div class="card-body">';

echo '<form method = "POST" action = "../php/project_manager_add.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Project Name:</label>
    <textarea name = "nume_proiect" class="form-control" id="messageTextBox" rows="1"></textarea>';
    
  echo '
  </div>
   <div class="form-group">
  <div class="dates">
    <label>Choose Deadline</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" >
    </div>
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description:</label>
    <textarea name = "descriere" class="form-control" id="messageTextBox" rows="3"></textarea>
    <div align = "right">
    <input name = "add_project" class="btn btn-primary" id="messageTextBox" type="submit" value="Add project">
 </div>
 
</form>';
    
  

echo '</div>
      </div>
      </div>';
   }
}
  else
  {
 echo ' <div class="container">
  <!-- Page Heading -->
  <h1 class="my-4">All your projects   
  </h1>
  <div class = "float-right">

  </div>
  <div class="row">';

    

  foreach ($projects as $key => $value) {
  echo' <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="../img/project.jpg" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="../html/projects_details.php?id='.$key.'"> '.$key.' </a>
          </h4>
          <p class="card-text">'. $value.'</p>
        </div>
      </div>
    </div>';
  }
    
   

echo '</div>';
}

?>
</body>

</html>

