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

             $data1 = $connection->query(" SELECT IS_ADMIN FROM AUTH WHERE EMAIL= '$email'");
             $row1 = mysqli_fetch_assoc($data1);
             $is_admin_check = $row1['IS_ADMIN'];
            
            if($is_admin_check != "1")
               header("Location: ../html/HomePage.php");




?>
<?php require '../php/admin_panel_start_script.php'; ?>

<?php
  
  $up = $_GET['up'];
  $mt = $_GET['mt'];
  if($mt == 0)
    {
      $em = "active"; 
      $aem = "";
      $pr = "";
      $rap = "";
      $mat = "";
      $cone = "";
    }
  elseif ($mt == 1) {
    
      $em = ""; 
      $aem ="active";
      $pr = "";
      $rap = "";
      $mat = "";
      $cone = "";
    }
  elseif ($mt == 2) {
    
      $em = ""; 
      $aem = "";
      $pr = "active";
      $rap = "";
      $mat = "";
      $cone = "";
    }
  elseif ($mt == 3) {
    
      $em = ""; 
      $aem = "";
      $pr = "";
      $rap = "active";
      $mat = "";
      $cone = "";
    }
  elseif ($mt == 4) {
    
      $em = ""; 
      $aem = "";
      $pr = "";
      $rap = "";
      $mat = "active";
      $cone = "";
    }
  elseif ($mt == 5) {
    
      $em = ""; 
      $aem = "";
      $pr = "";
      $rap = "";
      $mat = "";
      $cone = "active";
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
        <h1 class="my-4">Admin Panel</h1>
        <div class="list-group">
          <?php echo '<a href="../php/admin_panel_list.php?mt=0" class="list-group-item '.$em.'">Employees</a>'; ?>
          <?php echo' <a href="../php/admin_panel_list.php?mt=1" class ="list-group-item '.$aem.'">Add Employee</a>'; ?>
          <?php echo' <a href="../php/admin_panel_list.php?mt=2" class ="list-group-item '.$pr.'">Projects</a>'; ?>
          <?php echo' <a href="../php/admin_panel_list.php?mt=3" class="list-group-item '.$rap.'">Raports</a>'; ?>
          <?php echo' <a href="../php/admin_panel_list.php?mt=4" class="list-group-item '.$mat.'">Materials</a>'; ?>
          <?php echo' <a href="../php/admin_panel_list.php?mt=5" class="list-group-item '.$cone.'">Construction Equipment</a>'; ?>


        </div>
      </div>
      <!-- /.col-lg-3 -->

      
      <div class="col-lg-9">
       
          

 <?php
 if($em == "active")
 {  
    if($up == 1)
    {
     echo '<div class="card mt-4">';
    echo '<div class="card-body">';
    echo '<div class="card mt-4">';

    $eml = $_GET['eml'];
  echo '<div class="card-body">';
  echo ' <form method = "POST" action = "../php/admin_panel_make_update.php?eml='.$eml.'">
   <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Nume</label>
    <textarea name = "nume" class="form-control" id="exampleFormControlTextarea1" rows="1">'.$nume_up[0].'</textarea>
   
    
    <label for="exampleFormControlTextarea1">Prenume</label>
    <textarea name = "prenume" class="form-control" id="exampleFormControlTextarea1" rows="1">'.$prenume_up[0].'</textarea>
    
  </div>
    <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Email</label>
    <textarea name = "email" class="form-control" id="exampleFormControlTextarea1" rows="1" required>'.$email_up.'</textarea>  
  </div>
   <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Password</label>
   <textarea name = "password" class="form-control" id="exampleFormControlTextarea1" rows="1" required>'.$password.'</textarea>
  </div>
    <div class="form-group">
  
    <label for="exampleFormControlTextarea1">CNP</label>
    <textarea name = "cnp" class="form-control" id="exampleFormControlTextarea1" rows="1">'.$cnp_up[0].'</textarea>
  </div>
  <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Telefon</label>
    <textarea name = "telefon" class="form-control" id="exampleFormControlTextarea1" rows="1">'.$telefon_up[0].'</textarea>
  </div>

     <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Salariu</label>
    <textarea name = "salariu" class="form-control" id="exampleFormControlTextarea1" rows="1">'.$salariu_up[0].'</textarea> 
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Functie</label>
    <select name = "functie" class="form-control" id="exampleFormControlSelect1">';
      if($func_up[0] == "Angajat")
      echo'<option selected >Angajat</option>
      <option>Manager</option>';
      else
        echo'<option>Angajat</option>
            <option selected>Manager</option>';

      
    echo'</select>
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlSelect1">Echipa</label>
    <select name = "echipa" class="form-control" id="exampleFormControlSelect1">
      ';
      foreach ($nume_echipe_option as $neo) {
        if($neo == $nume_echipa_up)
           echo '<option selected>'.$neo.'</option>';
        else
          echo '<option>'.$neo.'</option>';
      }
      
    echo'</select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Is_admin</label>
    <select name = "is_admin" class="form-control" id="exampleFormControlSelect1">
      ';  
        if($is_admin ==0)
        {
          echo '<option selected >0</option>
               <option>1</option>';
        }
        else
          echo '<option  >0</option>
               <option selected>1</option>';

      
    echo'</select>
  </div>
  <div class="form-group">
    <div align = "right">
    <input name = "submit" class="btn btn-primary" type="submit" value="Update">
  </form>';


    }
    else
    {
    echo '<div class="card-body">';
	  echo' <table class="table">
  <thead>
    <tr>
      <th scope="col">Nume Prenume</th>
      <th scope="col">CNP</th>
      <th scope="col">Telefon</th>
      <th scope="col">Email</th>
      <th scope="col">Salariu</th>
      <th scope="col">Functie</th>
      <th scope="col">Echipa</th>
    </tr>
  </thead>
  <tbody>';
   for($i=0;$i<count($emails);$i++){
  echo'<tr>
      <th scope="row">'.$nume_prenume[$i].'</th>
      <td>'.$cnp[$i].'</td>
      <td>'.$telefon[$i].'</td>
      <td>'.$emails[$i].'</td>
      <td>'.$salariu[$i].'</td>
      <td>'.$func[$i].'</td>
      <td>'.$nume_echipa[$i].'</td>
      <td><a href = "../php/admin_panel_update.php?id='.$emails[$i].'"> <button type="button" class="btn btn-primary">Update</button></a></td>
      <td><a href = "../php/admin_panel_make_update.php?eml='.$emails[$i].'&delete=true"> <button name="delete" type="button" class="btn btn-danger">Delete</button></a></td>';   
}
   echo ' </tr>';
 }
 }
 elseif ($aem == "active") {
  echo '<div class="card mt-4">';
  echo '<div class="card-body">';
  echo ' <form method = "POST" action = "../php/admin_panel_add.php">
   <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Nume</label>
    <input name = "nume" class="form-control" >
   
    
    <label for="exampleFormControlTextarea1">Prenume</label>
    <input name = "prenume" class="form-control" >
    
  </div>
    <div class="form-group">
  
    <label for="exampleFormControlTextarea1">CNP</label>
    <input name = "cnp" class="form-control" >  
  </div>
  <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Telefon</label>
    <input name = "telefon" class="form-control" >  
  </div>

     <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Salariu</label>
    <input name = "salariu" class="form-control" >  
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Functie</label>
    <select name = "functie" class="form-control" id="exampleFormControlSelect1">
      <option>Angajat</option>
      <option>Manager</option>
      ';
      
    echo'</select>
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlSelect1">Echipa</label>
    <select name = "echipa" class="form-control" id="exampleFormControlSelect1">
      ';
      foreach ($nume_echipe_option as $neo) {
        echo '<option>'.$neo.'</option>';
      }
      
    echo'</select>
  </div>
  <div class="form-group">
    <div align = "right">
    <input name = "submit" class="btn btn-primary" type="submit" value="Add Employee">
  </form>';
   
 }
 elseif ($pr == "active") {
   echo '<div class="card-body">';
    echo' <table class="table">
  <thead>
    <tr>
      <th scope="col">Nume Proiect</th>
      <th scope="col">Descriere</th>
      <th scope="col">Deadline</th>
      <th scope="col">Echipa</th>
    </tr>
  </thead>
  <tbody>';
   for($i=0;$i<count($nume_proj);$i++){
  echo'<tr>
      <th scope="row">'.$nume_proj[$i].'</th>
      <td>'.$descriere_proj[$i].'</td>
      <td>'.$deadline_proj[$i].'</td>';
      if($nume_echipa_proj[$i] == NULL)
       echo ' <td>None</td>';
      else
      echo' <td>'.$nume_echipa_proj[$i].'</td>';   
    echo ' </tr>';
}
   

   
 }
elseif ($rap == "active") {
  echo '<div class="card-body">';
    echo' <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Raport</th>
      <th scope="col">  Proiect  </th>
      <th scope="col">  Angajat  </th>
      <th scope="col">Descriere</th>
    </tr>
  </thead>
  <tbody>';
   for($i=0;$i<count($rap_nume_proiect);$i++){
  echo'<tr>
      <th scope="row">'.$id_rap[$i].'</th>
      <td>'.$rap_nume_proiect[$i].'</td>
      <td>'.$nume_ang_rap[$i].'</td>';
      echo' <td>'.$rap_descriere[$i].'</td>';   
    echo ' </tr>';
  }
   
 }
elseif ($mat == "active") {
  echo '<div class="card-body">';
    echo' <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Material</th>
      <th scope="col"> Material</th>
      <th scope="col">  Stoc  </th>
   
    </tr>
  </thead>
  <tbody>';
   for($i=0;$i<count($id_mat);$i++){
  echo'<tr>
      <th scope="row">'.$id_mat[$i].'</th>
      <td>'.$nume_mat[$i].'</td>
      <td>'.$stoc_mat[$i].'</td>';
       echo' <td>
      <form method = "POST" action = "../php/admin_panel_add_stock.php?id='.$id_mat[$i].'">
      <div class="form-group">
      <div class = "align-right">
    <input size = "1" name = "add_stoc_mat" class="form-control" > 
    <input name = "submit" class="btn btn-primary" type="submit" value="Update Stock">
    </div>
  </form></td>';
    echo ' </tr>';
  }
   
   
 }
elseif ($cone == "active") {
  echo '<div class="card-body">';
    echo' <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Utilaj</th>
      <th scope="col">  Nume </th>
    </tr>
  </thead>
  <tbody>';
   for($i=0;$i<count($nume_ut);$i++){
  echo'<tr>
      <th scope="row">'.$id_ut[$i].'</th>
      <td>'.$nume_ut[$i].'</td>';
   


    echo ' </tr>';
  }
   
   
 }


?>

    </div>
    </div>
  </div>

</body>

</html>


