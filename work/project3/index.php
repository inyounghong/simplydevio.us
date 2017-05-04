<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="header">
      <?php include 'includes/nav.php' ?>
    </div>
    <div class="container lg">
        <h1>Home</h1>
      </div>
      <div class="gallery_container c">
        <div class="gallery">
          <?php

          // USER IS LOGGED IN
          if (isset($_SESSION['logged_user_by_sql'])) {
            require_once 'includes/config.php';
            $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
          ?>
          <br>
          <p>Welcome, <?php echo $_SESSION['logged_user_by_sql']?>!</p>
          <br>
          <div class="button_wrapper">
            <a href="view_albums.php" class="big_button"><img alt="View Albums" src="img/albums.png"><br> View Albums</a>
            <a href="photos.php" class="big_button"><img alt="View Photos" src="img/photos.png"><br>View Photos</a>
            <a href="upload.php" class="big_button"><img alt="Upload Photos" src="img/upload.png"><br>Upload Photos</a>
            <a href="search.php" class="big_button"><img alt="Search Photos" src="img/search.png"><br>Search Photos</a>
          </div>
          <?php
          }
          // USER IS NOT LOGGED IN
          else{
          ?>

          <p>Hello, Guest!</p>
          <br>
          <div class="button_wrapper">
            <a href="view_albums.php" class="big_button"><img alt="View Albums" src="img/albums.png"><br>View Albums</a>
            <a href="photos.php" class="big_button"><img alt="View Photos" src="img/photos.png"><br>View Photos</a>
            <a href="search.php" class="big_button"><img alt="Search Photos" src="img/search.png"><br>Search Photos</a>
          </div>
          <br>
          <p>Or <a href="login.php">Login</a> to edit and upload pictures.</p>

          <?php
          }

          
          ?>
        </div>


      
    </div>
  </body>
</html>

<!-- Credits:
  Icons from Freepik from www.flaticon.com
  http://www.flaticon.com/free-icon/magnifying-glass_49116
  http://www.flaticon.com/free-icon/upload-cloud_68857
  http://www.flaticon.com/free-icon/photo-camera_3901
  -->