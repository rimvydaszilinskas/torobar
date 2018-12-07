<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ToroBar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <link rel="stylesheet" href="../styles/loginStyles.css">
  </head>
  <body>

     <!-- /nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
     <div class="container">
      <a class="navbar-brand order-1 mr-0" href="#http://wwww.torobar.com/private/login" target="_blank">ToroBar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="about.php">About</a>
          <a class="nav-item nav-link" href="menu.php">Menu</a>
          <a class="nav-item nav-link" href="events.php">Events</a>
          <a class="nav-item nav-link" href="gallery.php">Gallery</a>
        </div>
       </div>
      </div> 
    </nav> 
    <!-- nav -->

    <!-- jumbotron -->
      <div class="jumbotron jumbotron-fluid bg-info text-white">
        <div class="container text-center pt-5 ">
          <h1 class="display-2 m-3">ToroBar</h1>
        </div>
      </div>  
    <!-- /jumbotron -->  
  
  <!-- Login Form -->
   <div class="container pt-4"> 
      <form action="php/logon.php" method="post">
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" id="username" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="password" required>

          <button type="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember">Remember me
          </label>
        </div>

        <div class="container" style="background-color:#ffffff">
          <button type="button" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot<a href="#"> password?</a></span>
        </div>  
      </form>
   </div>     

<?php 
  require_once("../shared/footer.php");
?>