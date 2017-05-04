<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Search</title>
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
    <div class="main_side">
      <div class="container">
        <h1>Search Results</h1>
      </div>

      <div class="gallery_container">
        <div class="gallery">

        <?php
        // Connect to mysql
        require_once 'includes/config.php';
        $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

        // Initializing all variables
        $keyword = "";
        $search_message = "";
        $album_str = "";
        $album_search = "";
        $caption_str = "";
        $caption_search = "";

        // If keyword is set
        if (isset($_GET['keywords'])){
          $keyword = $_GET['keywords'];
        }
        $keyword_str = "(Albums.title LIKE '%$keyword%' OR Photos.caption LIKE '%$keyword%')";

        // If album title is set
        if (isset($_GET['album_search'])){
          $album_search = $_GET['album_search'];
          $album_str = "AND Albums.title LIKE '%$album_search%'";
        }

        // If photo caption is set
        if (isset($_GET['caption_search'])){
          $caption_search = $_GET['caption_search'];
          $caption_str = "AND Photos.caption LIKE '%$caption_search%'";
        }

        $where = "WHERE $keyword_str $album_str $caption_str";

        $query_str = "SELECT DISTINCT Albums.album_id, Albums.title, Albums.date_modified, Albums.date_created, Photos.photo_id, Photos.image_url, Photos.caption FROM Albums INNER JOIN PhotoInAlbum ON Albums.album_id = PhotoInAlbum.album_id INNER JOIN Photos ON PhotoInAlbum.photo_id = Photos.photo_id $where";
        $query = $mysqli->query($query_str);

        // Different query for Album search
        if(isset($_GET['album_search']) && $keyword =="" && $caption_search=="" ){
          $query = $mysqli->query("SELECT * FROM Albums WHERE Albums.title LIKE  '%$album_search%'");
        }

        // Get number of results
        $num_results = $query->num_rows;

        // Display search message
        if ($num_results == 0){
          $search_message = "<p>Sorry! No results found.</p>";
        }
        else if ($num_results == 1){
          $search_message = "<p>$num_results result found.</p>";
        }
        else{
          $search_message = "<p>$num_results results found.</p>";
        }
        echo $search_message;


        // IF SEARCH IS FOR ALBUMS
        if(isset($_GET['album_search']) && $keyword =="" && $caption_search=="" ){
          
          // Loop through each album
          while ( $row = $query->fetch_assoc() ) {
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
            print ('<div class="cover"><div class="title" id="title-' . $row['album_id'] . '">' . $row['title'] . '</div>');
            print ('<div class="details">');
            print ($num_photos . ' Photos');
            print (' / Modified ' . $row['date_modified']);
            print ('</div></div></div>');
          }
        }
        // IF SEARCH IS FOR PHOTOS
        else{
          while ( $row = $query->fetch_assoc() ) {
            $album_id = $row['album_id'];
            print ('<div class="photo">');
            print ('<a href="view_albums.php?album_id=' . $album_id . '&amp;photo_id=' . $row['photo_id'] . '" class="thumb" style="background: #444 url(img/' . $row['image_url'] . ')"></a>');
            print ('<div class="cover">' . $row['caption'] . '<div class="date">In <a href="view_albums.php?album_id=' . $album_id . '">' . $row['title'] .'</a></div></div>');
            print ('</div>');
          }
        }


        ?>

        
        </div>
      </div>
    </div><!-- End main side -->

    <div class="search_side">
      <h2>Search</h2>
      <form action="search.php" method="GET">
        Keywords
        <input type="text" name="keywords" value="<?php echo $keyword; ?>">
        Album Title
        <input type="text" name="album_search" value="<?php echo $album_search; ?>">
        Photo Caption
        <input type="text" name="caption_search" value="<?php echo $caption_search; ?>">
        <input type="submit" class="search_button" name="submit" value="Search">
      </form>
    </div>
  </body>
</html>