<?php
    
    session_start();
    $user = $_SESSION['login_user'];


    
    if(isset($user))
	{
		header("Location: ../html/HomePage.php");
	}

    
    if(isset($_POST["Sigin"]))
    {
        $connection = new mysqli("localhost","admin","Informatica300","Gestiune_Proiecte_Base");
       
        $email = $connection->real_escape_string($_POST["email"]);
        $password = $connection->real_escape_string($_POST["password"]);
        $data = $connection->query(" SELECT NUME FROM AUTH WHERE EMAIL= '$email' AND PASSWORD ='$password'");
        $row = mysqli_fetch_assoc($data);
        if($data->num_rows > 0 )
        {   
            
            echo "Correct!";
            $_SESSION['login_user'] = $email;
            header("Location: ../html/HomePage.php");
            $check_data = 0;

        }
        else
        {
                   $check_data  = 1;

        }
    }
?>





<!DOCTYPE html>
<!-- saved from url=(0068)file:///home/stefan/Desktop/Signin%20Template%20for%20Bootstrap.html -->

<html lang="en">
	<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
	<!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
  
  <script type="text/javascript">
	function rtcScript() {
    document.oncontextmenu = null;
    document.onselectstart = null;
    document.onmousedown = null;
    document.onclick = null;
    document.oncopy = null;
    document.oncut = null;
    var elements = document.getElementsByTagName('*');
    for (var i = 0; i < elements.length; i++) {
        elements[i].oncontextmenu = null;
        elements[i].onselectstart = null;
        elements[i].onmousedown = null;
        elements[i].oncopy = null;
        elements[i].oncut = null;
    }
    function preventShareThis() {
        document.getSelection = window.getSelection = function() {
            return {isCollapsed: true};
        }
    }
    var scripts = document.getElementsByTagName('script');
    for (var i = 0; i < scripts.length; i++) {
        if (scripts[i].src.indexOf('w.sharethis.com') > -1) {
            preventShareThis();
        }
    }
    if (typeof Tynt != 'undefined') {
        Tynt = null;
    }
}
rtcScript();
setInterval(rtcScript, 2000);</script>
<style>
* {
    -webkit-user-select: auto !important; /* injected by RightToCopy */
}</style>
</head>

  <body class="text-center clickup-chrome-ext_installed">

    <form class="form-signin" method="POST" action="index.php">
    	<?php


  			if($check_data == 1)
  			{
  			//echo "You data is incorrect";
  				echo ('<div class="alert alert-danger" role="alert">
 									 Your data is incorrect
						</div>
					 ');
  			}

  		?>




      <h1 class="h3 mb-3 font-weight-normal">Log in</h1>


      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name = 'email' class="form-control" placeholder="Email address" required="" autofocus="" autocomplete="off"  background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;>
      

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name = 'password' class="form-control" placeholder="Password" required="" autocomplete="off"  background-repeat: no-repeat; background-attachment: scroll; background-size: 1   6px 18px; background-position: 98% 50%;>
     

      <button class="btn btn-lg btn-primary btn-block" type="submit" name = 'Sigin'>Sigin</button>   
    </form>
  

</body>
</html>
