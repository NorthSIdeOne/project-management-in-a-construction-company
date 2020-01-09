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
<?php 
  require '../php/projects_details_script.php';
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

  


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container-fluid primary-content">
  <!-- PRIMARY CONTENT HEADING -->
  <div class="primary-content-heading clearfix">
    <h2><?php 
        echo $project_name;
      ?></h2>
        <hr style="border:1px solid #fff">
    <div class="sticky-content pull-right">
      <div class="btn-group btn-dropdown">
        
       
      </div>
        <br>
            <br>
    </div>
    <!-- quick task modal -->
    
    <!-- end quick task modal -->
  </div>
  <!-- END PRIMARY CONTENT HEADING -->
  <div class="row">
    <div class="col-md-8">
      <div class="project-section general-info">
        <h3>Description</h3>
        <p><?php 
          echo $descriere;
          ?></p>
        <div class="row">
          <div class="col-sm-9">
            <dl class="dl-horizontal">
              <dt><font color="red">Deadline</font>:</dt>
              <dd><?php 

                   echo $deadline;
                ?></dd>
              <dt>Teams:</dt>
              <dd><span class="label label-success">
                <?php 
                  foreach ($echipe as $nume_echipa) {
                  echo $nume_echipa;
                  echo "<br>";
                         }
                  ?></span></dd>
                  <br>
                  <br>
            <?php echo '<dd> <a href ="../html/edit_project.php?id ='.$id_proiect.'"><button type="button" class="btn btn-success">Edit project</button></a></dd>'; ?>
          </div>
          <div class="col-sm-3">
            <div class="status-chart project-progress bottom-30px">
              <div class="pie-chart" data-percent="60"><span class="percent"></span><canvas height="100" width="100"></canvas></div>
            </div>
          </div>
        </div>
      </div>
      <div class="project-section activity">
      
        <ul class="list-unstyled project-activity-list">
          <li>
            <div class="media activity-item">
              <i class="fa fa-checkmark-circled pull-left text-success"></i>
              <div class="media-body">
                
              </div>
            </div>
          </li>
          <li>
            <div class="media activity-item">
              <a href="#" class="pull-left">
              </a>
              <div class="media-body">
                
                
              </div>
              <div class="btn-group pull-right activity-actions">
               
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                  
                </ul>
              </div>
            </div>
          </li>
          <li>
            <div class="media activity-item">
              <i class="fa fa-unlocked pull-left text-danger"></i>
              <div class="media-body">
               
              </div>
            </div>
          </li>
          <li>
            <div class="media activity-item">
              <a href="#" class="pull-left">
               
              </a>
              <div class="media-body">
               
                
              <div class="btn-group pull-right activity-actions">
               
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                 
                </ul>
              </div>
            </div>
          </li>
          <li>
     
          </li>
          <li>
            <div class="media activity-item">
              <i class="fa fa-printer pull-left text-warning"></i>
              <div class="media-body">
               
              </div>
            </div>
          </li>
          <li>
                 </li>
          <li>
            <div class="media activity-item">
              <a href="#" class="pull-left">
                
              </a>
              <div class="media-body">
                
               
                <div class="activity-attachment">
                  <div class="well well-sm">
                  
                  </div>
                </div>
              </div>
              <div class="btn-group pull-right activity-actions">
            
                  
              
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <!-- MY TODO LIST -->
      <div class="widget">
        <div class="widget-header clearfix">
          <h3><i></i> <span>Construction Equipment</span></h3>
          <div class="btn-group widget-header-toolbar">
            <a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="fa fa-ios-arrow-up"></i></a>
            <a href="#" title="Remove" class="btn btn-link btn-remove"><i class="fa fa-ios-close-empty"></i></a>
          </div>
        </div>
        <div class="widget-content">
          <ol >
             <?php 
             $i = 0;
             foreach ($utilaje as $nume => $data_s) {
            echo'<li>
              
              
                 <span class="todo-text">' .$nume.'</span>
                  <br>
              
                 <span class="todo-text"> <font color="red">Reserved</font>:'.$data_s.' -</span>
                 <span class="todo-text"> '.$rezervare_utilaj[$data_s].'</span>
              

              
            </li>';
          }
           ?>
          </ol>
        </div>
      </div>
      <!-- END MY TODO LIST -->
      <!-- RECENT FILES -->
      <div class="widget">
        <div class="widget-header clearfix">
          <h3><i class="fa fa-document"></i> <span>MATERIALS</span></h3>
          <div class="btn-group widget-header-toolbar">
            <a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="fa fa-ios-arrow-up"></i></a>
            <a href="#" title="Remove" class="btn btn-link btn-remove"><i class="fa fa-ios-close-empty"></i></a>
          </div>
        </div>

        <div class="widget-content">
          <ol >
            <?php 
            foreach ($materiale as $nume_mat => $stoc) {
              
            
           echo '<li>
                '.$nume_mat.'
                <br>
                Avalabile:<font color="green">'.$stoc.'</font>
            </li>';
          }
         
          ?>
           </ol>
        </div>
      </div>
      <!-- END RECENT FILES -->
    </div>
  </div>
</div>

</body>

</html>


