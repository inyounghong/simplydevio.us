<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Create Album</title>
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
    <div class="container">
      <h1>Create Album</h1>

      <?php
      if (isset($_SESSION['logged_user_by_sql'])) {
        // Start mysqli
        require_once 'includes/config.php';
        $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

        // Form checking

        // When user clicks upload
        if (isset($_POST['submit'])) {
          // Title
          if (empty($_POST['title'])){
            $title = "Untitled Album";
          }
          else{
            $title = $_POST['title'];
          }

          $user_id = 1;

          $mysqli->query('INSERT INTO Albums VALUES (NULL, "' . $title .'", CURDATE(), CURDATE(), "' . $user_id . '")');
          header("Location: view_albums.php");
        }

      ?>
      <form action="create_album.php" method="post" enctype="multipart/form-data" class="upload_form">
        <div class="col">
          <input type="text" name="title" placeholder="Album Title">
        </div>
        <div class="col">
        </div>
        <input type="submit" name="submit" value="Create Album">
      </form>
      <?php
      }
      else{
        echo '<p>Please <a href="login">login</a> to be able to access this page.</p>';
      }
      ?>
    </div>
  </body>
</html>