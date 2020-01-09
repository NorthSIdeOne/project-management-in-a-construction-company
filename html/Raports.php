<!DOCTYPE html>
<html lang="en">
<?php require '../php/raport_start_script.php'?>
<?php 
   session_start();
   $email = $_SESSION['login_user'];

   $id = $_GET['id'];

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
  $ut = "active";
  $at = "";
}
else
{
  $ut = "";
  $at = "active";
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
        <h1 class="my-4">Raports</h1>
        <div class="list-group">
          <?php echo '<a href="../php/raports_at_ut.php" class="list-group-item '.$ut.'">Make Raport</a>'; ?>
          <?php echo' <a href="../php/raports_ut_at.php" class="list-group-item '.$at.'">All Raports</a>'; ?>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <div class="card-body">
  <?php
  if($ut == "active")
  {
 echo ' <form method = "POST" action = "../php/raport_add.php">
  
  

  <div class="form-group">
    <label for="exampleFormControlSelect1">Select the project</label>
    <select name = "project" class="form-control" id="exampleFormControlSelect1">';
     foreach ($proiecte as $id_p => $nume_p) {
 
     echo ' <option>'.$id_p.')'.$nume_p.'</option>';
          }
    echo'</select>
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name = "raport" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <div align = "right">
    <input name = "submit" class="btn btn-primary" type="submit" value="Add raport">';
  }
else
  if($at = "active")
  {

  if($functie == "Manager" or $functie == "Admin")
  {
    echo' <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Raport</th>
      <th scope="col">Project</th>
      <th scope="col">Nume angajat</th>
      <th scope="col">Raport</th>
    </tr>
  </thead>
  <tbody>';

 for($i=0;$i<count($id_rap_manager);$i++){
    
    echo'<tr>
      <th scope="row">'.$id_rap_manager[$i].'</th>
      <td>'.$nume_proiecte_manager[$i].'</td>
      <td>'.$nume_ang_manager[$i].'</td>
      <td>'.$raport_manager[$i].'</td>';

      echo '<td><a href = "../php/raport_delete.php?id='.$id_rap[$i].'"> <button type="button" class="btn btn-danger">Delete</button></a></td>';
     
   echo ' </tr>';
  }
}
  else
  {
   echo' <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Raport</th>
      <th scope="col">Project</th>
      <th scope="col">Raport</th>
    </tr>
  </thead>
  <tbody>';

 for($i=0;$i<count($nume_proiecte_rap);$i++){
    
    echo'<tr>
      <th scope="row">'.$id_rap[$i].'</th>
      <td>'.$nume_proiecte_rap[$i].'</td>
      <td>'.$rapoarte[$i].'</td>';

      
     
   echo ' </tr>';
}
}
  }
?>

 </tbody>
</table>
</div>
  </div>
</form>
</div>

</div>
</div>

</body>

</html>

