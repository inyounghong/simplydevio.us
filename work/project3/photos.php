<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Photos</title>
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
        <h1>My Photos</h1>
      </div>
      <div class="header_details">
        My Photos
        <div class="right_bar"></div>
      </div>
      <div class="gallery_container">
        <div class="gallery">
          <?php
          require_once 'includes/config.php';
          $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

          $query_str = "SELECT * FROM Photos ORDER BY Photos.photo_id DESC";
          $result = $mysqli->query($query_str);   
          $row_count = $result->num_rows;

          // NO PHOTOS
          if ($row_count == 0){
            echo '<p>There are no pictures in this album.</p>';
            echo '<a href="upload.php">Upload Photos</a>';
          }

          while ( $row = $result->fetch_assoc() ) {
            $photo_id = $row['photo_id'];
            print ('<div class="photo" id="photo-' . $photo_id . '">');
            print ('<a href="view_photo.php?photo_id=' . $photo_id . '"  class="thumb" style="background: #444 url(img/' . $row['image_url'] . ')"></a>');
            print ('<div class="cover"><div class="caption" id="caption-' . $photo_id . '">' . $row['caption'] . '</div></div>');
            print ('</div>');
          }

          ?>

      </div>

      
    </div>
  </body>
</html>