<!DOCTYPE html>
<html lang="en">
<?php require '../php/edit_project_start.php';?>

<?php

  
             $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
             $data = $connection->query(" SELECT FUNCTIE FROM ANGAJATI WHERE EMAIL= '$email'");
             $row = mysqli_fetch_assoc($data);
             $functie = $row['FUNCTIE'];


  $mt = $_GET['mt'];
  $check = $_GET['check'];


  if($mt == 0)
    {
      $dt = "active"; 
      $ct = "";
      $mt = "";
    }
  else
    {
      if($mt == 1)
      { 
        $dt = ""; 
        $ct = "active";
        $mt = "";
      }
      else
         if($mt == 2)
        { 
          $dt = ""; 
         $ct = "";
         $mt = "active";
       }
  
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
        <h2 class="my-4">Manage Project</h1>
        <div class="list-group">
          <?php echo '<a href="../php/describe.php" class="list-group-item '.$dt.'">Description</a>'; ?>
          <?php echo' <a href="../php/construct.php" class="list-group-item '.$ct.'">Construction Equipment</a>'; ?>
          <?php echo' <a href="../php/mat.php" class="list-group-item '.$mt.'">Materials</a>'; ?>

        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <div class="card-body">

<?php       
if($dt == "active")
 {
  echo '<form method = "POST" action = "../php/project_manager_update.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Project Name:</label>
     <textarea name = "nume_proiect" class="form-control" id="messageTextBox" rows="1" placeholder="">'.$nume_proiect.'</textarea>
  </div>
   <div class="form-group">
  <div class="dates">
    <label>Edit Deadline</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="event_date" value="'.$deadline.'" autocomplete="off" >
    </div>
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Edit description</label>
    <textarea name = "descriere" class="form-control" id="messageTextBox" rows="7">'.$descriere.'</textarea>
    <div align = "right">
    <input name = "update" class="btn btn-primary" id="messageTextBox" type="submit" value="Update Project">
    <button name = "delete" class="btn btn-danger" type="submit">Delete Project</button>
 </div>
 
</form>';
}
else
  if($ct == "active")
  {
    echo '<form method = "POST" action = "../php/Construction_Equipement_add.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Construction Equipment:</label>';
      echo '<select name = "eq" class="form-control" id="exampleFormControlSelect1">';
     foreach ($utilaje as $id_u => $nume_u) {
      
      
      echo'<option>'.$id_u.')'.$nume_u.'</option>';
    }
  echo 
  '</select>
  </div>
   <div class="form-group">
  <div class="dates">
    <label>Start date</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="start" placeholder="YY/MM/DD" autocomplete="off" >
    </div>
    <div class="dates">
    <label>End date</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="end" placeholder="YY/MM/DD" autocomplete="off" >
    </div>
</div>
  <div class="form-group">
    <div align = "right">
    <input name = "add_reservation" class="btn btn-primary" id="messageTextBox" type="submit" value="Add reservation">
 </div>
 
</form>';

  echo '</div>
    </div>
    </div>';
     echo '

        <div class="card mt-4">
          <div class="card-body">';

          echo '<form method = "POST" action = "../php/Construction_Equipement_update.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Construction Equipment:</label>';
      echo '<select name = "utilaj" class="form-control" id="exampleFormControlSelect1">';
     foreach ($utilaje_proiect as $id_u => $nume_u) {
      
      
      echo'<option>'.$id_u.')'.$nume_u.'</option>';
    }
  echo 
  '</select>
  </div>
   <div class="form-group">
  <div class="dates">
    <label>Start date</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="start" placeholder="YY/MM/DD" autocomplete="off" >
    </div>
    <div class="dates">
    <label>End date</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="end" placeholder="YY/MM/DD" autocomplete="off" >
    </div>
</div>
  <div class="form-group">
    <div align = "right">
    <input name = "update" class="btn btn-primary" id="messageTextBox" type="submit" value="Update rezervation">
    <button name = "delete" class="btn btn-danger" type="submit">Delete rezervation</button>
 </div>
 
</form>';


  }
  else
    if($mt == "active")
    {
       if($check == 1)
      {
      echo'<div class="alert alert-danger" role="alert">
       Not enough materials in stock!
      </div>';
      $check = 0;
     }
      echo '<form method = "POST" action = "../php/Materials_add.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Select construct material:</label>';
      echo '<select name = "material" class="form-control" id="exampleFormControlSelect1">';
     foreach ($mat_all as $id_mat => $nume_mat) {
      
      
      echo'<option>'.$id_mat.')'.$nume_mat.'</option>';
    }
  echo 
  '</select>
  </div>
   <div class="form-group">
    <label>Quantity</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="stoc" placeholder="Number of units" autocomplete="off" >
</div>
  <div class="form-group">
    <div align = "right">
    <input name = "add_material" class="btn btn-primary" id="messageTextBox" type="submit" value="Add material">
 </div>
 
</form>';

  echo '</div>
    </div>
    </div>';
     echo '

        <div class="card mt-4">
          <div class="card-body">';
          if($check == 1)
      {
      echo'<div class="alert alert-danger" role="alert">
       Not enough materials in stock!
      </div>';
      $check = 0;
     }
          echo '<form method = "POST" action = "../php/Materials_update.php">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Select construct material::</label>';
      echo '<select name = "material" class="form-control" id="exampleFormControlSelect1">';
     for($i=0;$i<count($nume_mat_proiect);$i++) {
      
      
      echo'<option>'.$id_mat_pr[$i].')'.$nume_mat_proiect[$i].':'.$cantitate_pr[$i].'</option>';
    }
  echo 
  '</select>
  </div>
   <div class="form-group">
  <label>Quantity</label>
    <input type="text" style="width:200px" class="form-control" id="usr1" name="stoc" placeholder="Number of units" autocomplete="off" >
</div>
  <div class="form-group">
    <div align = "right">
    <input name = "update" class="btn btn-primary" id="messageTextBox" type="submit" value="Add stock">
    <button name = "delete" class="btn btn-danger" type="submit">Delete material</button>
 </div>
 
</form>';


    }
?>

    </div>
    </div>
  



</body>

</html>