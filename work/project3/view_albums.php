<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Albums</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php
    $editable ="";
    if (isset($_SESSION['logged_user_by_sql'])){
      $editable = "editable";
    ?>
      <script>
      // AJAX FOR EDITING ALBUM TITLE
      function editTitle(id, new_title) {
        if (new_title == "") {
          new_title = "Untitled Album";
        } 
        else { 
          // AJAX request
          if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
          }
          xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              // Change input box back to regular div
              $('#title-' + id).html(new_title);
              $('#ajax_message').html(xmlhttp.responseText);
            }
          }
          // Update through mysql
          xmlhttp.open("GET","includes/edit_title.php?title="+new_title+"&album_id="+id,true);
          xmlhttp.send();
        }
      }

      // AJAX FOR EDITING CAPTION
      function editCaption(id) {
        var new_field = $("#caption_input" + id).val();

        if (new_field == "") {
          new_field = "Caption";
        } 
        else { 
          // AJAX request
          if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
          }
          xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              // Change input box back to regular div
              $('#caption-' + id).html(new_field);
              $('#ajax_message').html(xmlhttp.responseText);
            }
          }
          // Update through mysql
          xmlhttp.open("GET","includes/edit_caption.php?caption="+new_field+"&photo_id="+id,true);
          xmlhttp.send();
        }
      }

      $( document ).ready(function() {

        // EDITING ALBUM TITLE
        $(".title").click(function() {
          // If the edit button hasn't already been clicked
          if ($(this).html().indexOf('<input') >= 0){
            return;
          }
          else{
            $index = parseInt($(this).attr('id').indexOf('-')) + 1;
            $id = $(this).attr('id').substring($index);

            // Make the title div into an editable input field
            $(this).html('<input type="text" class="title_input" id="title_input' + $id+'" onblur="editTitle(' + $id+', this.value)" name="title" value="' + $(this).html() + '">');
            $('#title_input' + $id).focus();
          }
        });

        // EDITING PHOTO CAPTION
        $(".caption").click(function() {
          // If the edit button hasn't already been clicked
          if ($(this).html().indexOf('<textarea') >= 0){
            return;
          }
          else{
            $index = parseInt($(this).attr('id').indexOf('-')) + 1;
            $id = $(this).attr('id').substring($index);

            // Make the caption div into an editable input field
            $(this).html('<textarea class="caption_input" id="caption_input' + $id+'" onblur="editCaption(' + $id+')" name="caption">' + $(this).html() + '</textarea>');
            $('#caption_input' + $id).focus();
          }
        });

      });
      
      </script>
      <?php }?>
    <div class="header">
      <?php include 'includes/nav.php' ?>
    </div>
    <div class="container lg">

      <?php
      require_once 'includes/config.php';
      $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
      $result = "";

      // ONE ALBUM VIEW
      if (isset($_GET['album_id'])){
        $album_id = $_GET['album_id'];
        $photo_query = "";

        // mySQL query for photos
        $query_str = "SELECT * FROM PhotoInAlbum INNER JOIN Photos ON PhotoInAlbum.photo_id = Photos.photo_id WHERE PhotoInAlbum.album_id = $album_id $photo_query";
        $result = $mysqli->query($query_str);          

        // Get title of album from given album_id
        $album_title = $mysqli->query("SELECT * FROM Albums WHERE album_id = " . $album_id);
        
        while ( $row = $album_title->fetch_assoc() ) {
          $a_title = $row['title'];
          print('<h1>' . $row['title'] . '</h1>');
          print('<div class="subtitle">');
          print('Modified ' . $row['date_modified'] .' / Created ' . $row['date_created']);
          print('</div></div><div class="header_details"><div class="breadcrumbs">');
          print('<a href="view_albums.php">All Albums</a> > ' . $row['title']);
        }


        // INSIDE ALBUM VIEW

        print('</div><div class="right_bar">');
        // Display delete album link if user is logged in
        if (isset($_SESSION['logged_user_by_sql'])){
          print('<a href="includes/delete_album.php?album_id=' .$album_id.'">Delete Album</a>');
        }
        print('</div><div id="ajax_message"></div></div><div class="gallery_container"><div class="gallery">');
        $num_results = $result->num_rows;
        // NO PHOTOS
        if ($num_results == 0){
          echo '<p>There are no pictures in this album.</p>';
          echo '<a href="upload.php">Upload Photos</a>';
        }

        while ( $row = $result->fetch_assoc() ) {
          $photo_id = $row['photo_id'];
          print ('<div class="photo" id="photo-' . $photo_id . '">');
          print ('<a href="view_photo.php?album_id=' . $album_id . '&photo_id=' . $photo_id . '"  class="thumb" style="background: #444 url(img/' . $row['image_url'] . ')"></a>');
          print ('<div class="cover"><div class="caption '.$editable.'" id="caption-' . $photo_id . '">' . $row['caption'] . '</div></div>');
          print ('</div>');
        }

      }
      // SHOW ALL ALBUMS
      else{
        ?>

            <h1>Albums</h1>
          </div>
          <div class="header_details">
            &nbsp;
            <?php 
            if (isset($_SESSION['logged_user_by_sql'])){
              echo '<div class="fr"><a class="add_button" href="create_album.php">+ New Album</a></div>';
            }?>
          </div>
          <div class="gallery_container">
            <div class="gallery">

          <?php
          $album_result = $mysqli->query("SELECT * FROM Albums");
          $num_albums = $album_result->num_rows;
          
          // Loop through each album
          while ( $row = $album_result->fetch_assoc() ) {
            $album_id = $row['album_id'];
            // Get number of photos in each album
            $photo_results = $mysqli->query("SELECT * FROM PhotoInAlbum WHERE PhotoInAlbum.album_id = $album_id");    
            $num_photos = $photo_results->num_rows;

            $cover_photo = $mysqli->query("SELECT Photos.image_url FROM PhotoInAlbum INNER JOIN Photos ON PhotoInAlbum.photo_id = Photos.photo_id WHERE PhotoInAlbum.album_id = $album_id LIMIT 0,1"); 

            if ($num_photos > 0){
              while ( $row1 = $cover_photo->fetch_assoc() ) {
                $image_url = $row1['image_url'];
              }
            }
            else{
              $image_url = "default";
            }

            print ('<div class="photo" id="photo' . $row['album_id'] . '">');
            print ('<a href="?album_id=' . $row['album_id'] . '"  class="thumb" style="background: #444 url(img/' . $image_url . ')"></a>');
            print ('<div class="cover"><div class="title '.$editable.'" id="title-' . $row['album_id'] . '">' . $row['title'] . '</div>');
            print ('<div class="details">');
            print ($num_photos . ' Photos');
            print (' / Modified ' . $row['date_modified']);
            print ('</div></div></div>');
          }
        }
        $mysqli->close();

      ?>
      </div> <!-- End Gallery -->

    </div> <!-- End Container -->
  </body>
</html>