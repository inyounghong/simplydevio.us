<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upload New Image</title>
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
      <h1>Upload New Image</h1>
    </div>
    <div class="container lg g">
      <div class="container ">

      <?php
      if (isset($_SESSION['logged_user_by_sql'])) {
        // Start mysqli
        require_once 'includes/config.php';
        $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

        $result = $mysqli->query("SELECT * FROM Photos");          
        
        // Form checking

        // Returns true if the given file is a valid image under the size limit
          function validImage($file) {
            // Get file extension
            $temp = explode(".", $file["name"]);
            $extension = end($temp);
            if (($file["type"] == "image/gif" || $file["type"] == "image/jpeg" || $file["type"] == "image/png") && ($file["size"] < 10000000) && ($extension == "gif" || $extension == "png" || $extension == "jpg" || $extension == "jpeg")){
              return true;
            }
            return false;
          }

          $caption_error = "";
          $photo_error = "";
          $error_message = "";
          $message = "";

          // When user clicks upload
          if (isset($_POST['submit'])) {
            $photo = $_FILES['new_photo'];
            // IMAGE UPLOAD CHECKING
            if (validImage($photo)){
              // Some photo error
              if ($photo["error"] > 0) {
                $photo_error = '<div class="error">Error: ' .$photo["error"] . '</div';
              } 
              else {
                $oldpath = $photo["tmp_name"];
                $newpath = "img/" . $photo["name"];

                $orig_name = $photo["name"];
                // If uploaded photo has a repeated name, append a number to the end
                while (file_exists("img/" . $orig_name)) {
                  $extension = substr($orig_name, -4);
                  $new_file_name = substr($orig_name, 0, -4) . "1" . $extension;
                  $orig_name = $new_file_name;
                }
                $newpath = "img/" . $orig_name;
                // File upload successful
                if (move_uploaded_file( $oldpath, $newpath)) {
                  $image_url = $orig_name;
                } 
                else{
                  $photo_error = 'There was an error with uploading! ';
                }
              }
            }
            // Invalid file type error
            else{
              $photo_error .= 'Photos can only be gifs, jpgs, or pngs. ';
            }
          
            // Caption (Required)
            if (empty($_POST['caption'])){
              $photo_error = "Please enter a caption.";
            }
            else{
              $caption = filter_input( INPUT_POST, 'caption', FILTER_SANITIZE_STRING );
              if (strlen($caption) > 200){
                $photo_error .= "Caption is too long!";
              }
            }

            // Date Taken
            $date_taken = "CURDATE()";
            if (isset($_POST['date_taken']) && $_POST['date_taken'] != ""){
              // If a date is given
              $date_taken = '"' . $_POST['date_taken'] . '"';
            }

            // If no submission errors, insert into database
            if (empty($caption_error) && empty($photo_error)){
              // Insert into Photos
              $mysqli->query('INSERT INTO Photos VALUES (NULL, "' .$caption. '", "' .$image_url. '", ' .$date_taken. ')');

              $photo_result = $mysqli->query("SELECT photo_id FROM Photos ORDER BY photo_id DESC LIMIT 1");
              $photo_id = $photo_result->fetch_assoc();
              $photo_id = $photo_id['photo_id'];
              
              // Insert into PhotoInAlbum
              if(!empty($_POST['albums'])){
                // Loop through each selected checklist
                foreach($_POST['albums'] as $album_id){
                  // Insert photo and album into PhotoInAlbum
                  $mysqli->query('INSERT INTO PhotoInAlbum VALUES ("' . $photo_id . '", "'.$album_id. '")');
                  // Update modified date of Albums
                  $mysqli->query('UPDATE Albums SET date_modified = CURDATE() WHERE album_id = "'.$album_id.'"');
                }
              }
              $message = '<div class="message success">Photo has been successfully uploaded.</div>';
            }
            // If there was an error
            else{
              $error_message = 'There was an error with uploading the photo! ';
            }
          }

        ?>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="upload_form">
          <?php echo $message; 
          if ($error_message != "" || $photo_error != ""){
            print ('<div class="message error">' . $error_message . $photo_error . '</div>');
          }
          ?>
          <div class="col">
            <input type="file" name="new_photo" required>
            <textarea name="caption" placeholder="Photo Caption" required></textarea>
            <input type="date" name="date_taken">
          </div>
          <div class="col">
            <div class="scroll">
              <?php 
              
                $album_result = $mysqli->query("SELECT * FROM Albums");
                $num_albums = $album_result->num_rows;
            
                // Print checkbox for each album
                while ( $row = $album_result->fetch_assoc() ) {
                  print ('<label><input type="checkbox" name="albums[]" value="' . $row['album_id'] . '">' . $row['title'] . '</label><br>');
                }
                $mysqli->close();
              ?>
            <a class="create_new" href="create_album.php">Create New Album</a>
          </div>
        </div>
        <input type="submit" name="submit" value="Add Photo">
      </form>
      <?php }
      else{
        echo '<p>Please <a href="login">login</a> to be able to access this page.</p>';
      }
      ?>
      </div>
    </div>
  </body>
</html>