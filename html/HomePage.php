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


  <!-- Header - set the background image for the header in the line below -->
  <header class="py-5 bg-image-full" style="background-image: url('../img/image9.jpg');">
    <img class="img-fluid d-block mx-auto" src="../img/logo2.png" alt="">
  </header>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>Leading Work Management Solution</h1>
      <p>Cloud-based collaboration and project management software that scales across teams in any business.</p>
    </div>
  </section>

  <!-- Image Section - set the background image for the header in the line below -->
  <section class="py-5 bg-image-full" style="background-image: url('../img/image10.jpg');">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 200px;"></div>
  </section>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>Organize everything you need to complete your project in one place</h1>
      <p>Keep your priorities straight and your goals in sight. Customize dashboards so you only see what you want to see.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
