<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Signin </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
     
      <form class="form-signin" role="form" action = "verifyLogin.php" method = "POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email"  class="form-control" placeholder="Email address" name = "username" required autofocus>
        <input type="password"  class="form-control" placeholder="Password" name = "password" required>
        <label class="checkbox">
        </label>
        <button class="btn btn-lg btn-primary btn-block"  type="submit">Sign in</button>
      </form>
    

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>



<?php
//start session 
//connect to the database 
session_start(); 
require('files/connect.php'); 
// username and password sent from form
$username=$_POST['username'];
$password = $_POST['password']; 
//password encryption
//mysqli injection prevention 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con, $password);

$query="SELECT * FROM users WHERE username='$username' and password='$password'";
$result=mysqli_query($con, $query);

    if (!$result) {
    echo "nope"; 
    die("Database insert failed  for " . $username . mysqli_error($con));
    exit();
    }

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
//set session variable to username
  $_SESSION['username'] = $_POST['username'];
	header("location:yay.php"); 
}
else {
	echo "
      <script type=\"text/javascript\">
			alert('You have entered a wrong username or password') ;
            </script>
			
        ";
	

	}
?>



	

