<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "onetiualex";
  $dbpass = "student32";
  $dbname = "proiectdb";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occurred.
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Subiectul5</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="style/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ranga" rel="stylesheet">
	</head>
	<body>
    <div id="header">
     <a href="index.php" class="title"> <h1>Subiectul 5 - Colocviu Final De Laborator</h1></a>
     <a id="logo" href="index.php"></a>
       <div id="navigation">
 		     <div class="container">
          <div class="row">
              <a href="interogarea3a.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 3a</h2></a>
              <a href="interogarea3b.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 3b</h2></a>
              <a href="interogarea4a.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 4a</h2></a>
              <a href="interogarea4b.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 4b</h2></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="text-align: center; margin-top:30px;">
      <div class="row">
          <a href="interogarea5a.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 5a</h2></a>
          <a href="interogarea5b.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 5b</h2></a>
          <a href="interogarea6a.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 6a</h2></a>
          <a href="interogarea6b.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogarea 6b</h2></a>
      </div>
    </div>
