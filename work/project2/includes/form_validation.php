<?php

// Get values from all inputs
    $url = strip_tags($_POST['url']);
    $title = strip_tags($_POST['title']);
    $artist = $_POST['artist'];
    $category = $_POST['category'];
    $keywords = $_POST['keywords'];

    // URL Validation
    if(empty($url)){
      $url_error = "Please enter an image URL.";
    }    
    else if(!preg_match("/^http/", $url)){
      $url_error = "Please enter a valid image URL.";
    }
    else if(!preg_match("/\.[png | jpg | gif]+$/", $url)){
      $url_error = "The image must be a png, jpg, or gif.";
    }

    // Title Validation
    if(empty($title)){
      $title_error = "Please enter a title.";
    } 
    else if (strlen($title) > 100){
      $title_error = "Title must be under 100 characters.";
    }

    // Artist Validation
    if(empty($artist)){
      $artist_error = "Please enter an artist.";
    } 
    else if (strlen($artist) < 3){
      $artist_error = "Artist username must be at least 3 characters.";
    }
    else if (strlen($artist) > 40){
      $artist_error = "Artist username must be under 40 characters.";
    }
    else if (!preg_match("/^[a-zA-Z0-9-]+$/", $artist)){
      $artist_error = "Artist username can only contain letters, numbers, and dashes.";
    }

    // Keyword Validation
    $keywords_list = preg_split("/\s+/", trim($keywords));
    
    // Initialize keyword validation points
    $keyword_is_short = false;
    $keyword_is_long = false;
    $ill_chars = false;
    $keywords_are_unique = true;

    // check whether any keyword is fewer than 3 characters long
    $i = 0; 
    while($i < sizeof($keywords_list)){
      if (strlen($keywords_list[$i]) < 3){
        $keyword_is_short = true;
      }
      else if(strlen($keywords_list[$i]) > 25){
        $keyword_is_long = true;
      }
      // Check whether any keyword contains illegal chars
      if (!preg_match("/^[a-zA-Z0-9]+$/", $keywords_list[$i])){
        $ill_chars = true;
      }
      $i++;
    }
    // check whether each keyword is unique
    
    $unique_keywords = array_unique($keywords_list);
    if (sizeof($unique_keywords) != sizeof($keywords_list)){
      $keywords_are_unique = false;
    }
    // rest of checking for keywords
    if(sizeof($keywords_list) < 3 || sizeof($keywords_list) > 5){
      $keywords_error = "Please enter 3 to 5 different keywords.";
    } 
    else if($ill_chars){
      $keywords_error = "Keywords can only contain numbers and letters.";
    }
    else if($keyword_is_short || $keyword_is_long){
      $keywords_error = "Keywords must be between 3 to 25 characters in length.";
    }
    else if(!$keywords_are_unique){
      $keywords_error = "Keywords must all be unqiue.";
    }

    // Category Validation
    if($category == "none"){
      $category_error = "Please select a category.";
    } 

    ?>