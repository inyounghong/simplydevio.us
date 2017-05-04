<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Photo</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php
    $editable = "";
    if (isset($_SESSION['logged_user_by_sql'])){
      $editable = "editable";
    ?>
      <script>

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

        $('#hidden_checks').css("display", "none");
        // DISPLAYING ALBUM CHECKBOXES
        $("#show_checks").click(function(){
          $('#hidden_checks').toggle();
        })


      });
      
      </script>
      <?php } ?>

    <div class="header">
      <?php  include 'includes/nav.php' ?>
    </div>
    <div class="container lg">

    <?php

    // Set up MYSQL
    require_once 'includes/config.php';
    $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

    $photo_id = $_GET['photo_id'];
    $back_string = '<a class="back_link" href="photos.php">&lt; Back to All Photos</a>';

    // mySQL query for photos
    $query_str = "SELECT * FROM PhotoInAlbum RIGHT JOIN Photos ON PhotoInAlbum.photo_id = Photos.photo_id WHERE Photos.photo_id = $photo_id LIMIT 1";
    $result = $mysqli->query($query_str);   

    if(isset($_GET['photo_id'])){ 

      // IF PHOTO IS BEING VIEWED IN AN ALBUM
      if (isset($_GET['album_id'])){
        $album_id = $_GET['album_id'];

        $query_str = "SELECT * FROM PhotoInAlbum INNER JOIN Photos ON PhotoInAlbum.photo_id = Photos.photo_id WHERE Photos.photo_id = $photo_id AND PhotoInAlbum.album_id = $album_id LIMIT 1";
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
          print ('<div class="padding"><div class="right_bar">');
          // Print Delete button only if logged in
          if (isset($_SESSION['logged_user_by_sql'])){
            print('<a href="includes/delete_photo.php?photo_id=' . $photo_id . '">Delete Photo</a>');
          }
          print('</div></div>');
        }

        $back_string = '<a class="back_link" href="view_albums.php?album_id=' . $album_id . '">&lt; Back to '.$a_title.'</a>';

      } // End album-specific details
      else{
        if (isset($_SESSION['logged_user_by_sql'])){
          print('<div class="header_details">');
          print ('<div class="padding"><div class="right_bar"><a href="includes/delete_photo.php?photo_id=' . $photo_id . '">Delete Photo</a></div></div></div>');
        }
      }
      // HANDLING ALBUM UPDATES
      if (isset($_POST['update_albums'])){
        
        $photo_album_result = $mysqli->query("SELECT PhotoInAlbum.album_id FROM PhotoInAlbum WHERE photo_id = $photo_id");

        // Get array of albums in database
        $db_albums = array();
        while ($album_row = $photo_album_result->fetch_assoc()) {
          $db_albums[] = $album_row['album_id'];
        }

        // Get array of checked albums
        $checked_albums = $_POST['albums'];

        $insert_list = array();
        $delete_list = array();

        // Check for albums to delete
        foreach ($db_albums as $db_album){
          if (!in_array($db_album, $checked_albums)){
            array_push($delete_list, $db_album);
          }
        }

        // Check for albums to insert
        foreach ($checked_albums as $ch_album){
          if (!in_array($ch_album, $db_albums)){
            array_push($insert_list, $ch_album);
          }
        }

        // Insert albums and update date_modified
        foreach ($insert_list as $album_id){
          $mysqli->query('INSERT INTO PhotoInAlbum VALUES ("' . $photo_id . '", "'.$album_id. '")');
          $mysqli->query("UPDATE Albums SET date_modified = CURDATE() WHERE album_id = $album_id");
        }
        // Delete albums and update date_modified
        foreach ($delete_list as $album_id){
          $mysqli->query("DELETE FROM PhotoInAlbum WHERE photo_id = $photo_id AND album_id = $album_id");
          $mysqli->query("UPDATE Albums SET date_modified = CURDATE() WHERE album_id = $album_id");
        }
      }

      print('</div><div id="ajax_message"></div></div><div class="gallery_container"><div class="gallery">');
      // mySQL query for photos

      while ( $row = $result->fetch_assoc() ) {
        print ('<div class="photo large">');
        print ('<img src="img/' . $row['image_url'] . '"></div>');
        print ('<div class="sidebar">');
        print ($back_string);
        print ('<div class="padding"><div class="caption ' .$editable.'" id="caption-' . $photo_id . '">' . $row['caption'] . '</div></div>');

        // Print the albums the photo is in
        print ('<div class="padding">');
        print ('Albums: ');

        // Results of all albums
        $album_result = $mysqli->query("SELECT * FROM Albums");
        $check_str = '<div id="hidden_checks"><form action="" method="post">';
        $index = 0;

        // Loop through all albums and create checkboxes
        while ( $row2 = $album_result->fetch_assoc()) {
          $checked = "";
          $album_id2 = $row2['album_id'];

          // Results of which album the photo is in
          $photo_album_result = $mysqli->query("SELECT PhotoInAlbum.album_id FROM PhotoInAlbum INNER JOIN Photos ON PhotoInAlbum.photo_id = Photos.photo_id WHERE Photos.photo_id = $photo_id AND PhotoInAlbum.album_id = $album_id2");
          $num_results = $photo_album_result->num_rows;

          // Check if the photo is in the given album
          if ($num_results != 0){
            $checked = " checked ";
            if ($index != 0){
              print (', ');
            }
            print($row2['title']);
            $index++;
          }
          
          $check_str .= '<label><input type="checkbox" name="albums[]" value="' . $row2['album_id'] . '"' . $checked .'>' . $row2['title'] . '</label><br>'; 

        }
        // Print hidden check boxes and delete if user is logged in
        if (isset($_SESSION['logged_user_by_sql'])){
          print ('<div id="show_checks" class="linky">Edit Albums</div>');
          print($check_str);
          print ('<input type="submit" name="update_albums" value="Update Albums"></form></div></div>');
        }

        print ('</div><div class="padding"><div class="details">Date Taken: ' . $row['date_taken'] . '</div></div>');
        print ('</div><div class="clear">&nbsp;</div>'); 
      }
    }
    

  
 ?>
      </div> <!-- End Gallery -->


  </body>
</html>