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
  $functie1 = $row['FUNCTIE'];





?>
<?php require '../php/teams_script.php';?>
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
            if($functie1 == "Manager" or $functie1 == "Admin")
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


<!-- Section: Team v.1 -->
<section class="team-section text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5"><?php echo $nume_e; ?></h2>
  <!-- Section description -->
  

  <!-- Grid row -->
  <div class="row">
<?php 
   
    foreach ($full_description as $name => $tel) {
      # code..
    if($position[$name] == "Manager")
        $pos = "Manager";
    else
      $pos = "Employee";
 echo '  <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
      <div class="avatar mx-auto">
        <img src="../img/profile.png" height="170" width="170" class="rounded-circle z-depth-1"
          alt="Sample avatar">
      </div>
      <h5 class="font-weight-bold mt-4 mb-3">'.$name.'</h5>
      <p class="text-uppercase blue-text"><strong>'.$pos.'</strong></p>

      <p class="grey-text">Phone:'.$tel.'</p>

      <ul class="list-unstyled mb-0">
        <!-- Facebook -->
        <a class="p-2 fa-lg fb-ic">
          <i class="fab fa-facebook-f blue-text"> </i>
        </a>
        <!-- Twitter -->
        <a class="p-2 fa-lg tw-ic">
          <i class="fab fa-twitter blue-text"> </i>
        </a>
        <!-- Instagram -->
        <a class="p-2 fa-lg ins-ic">
          <i class="fab fa-instagram blue-text"> </i>
        </a>
      </ul>
    </div>';
  }
   ?>
  </div>
  <!-- Grid row -->
</section>

<!-- Section: Team v.1 -->
  
</body>

</html>

