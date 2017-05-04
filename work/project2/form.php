<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Artwork Catalog</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php
      // Set up variables
      $delimiter = ' || ';
      $url = '';
      $title = '';
      $artist = '';
      $category = '';
      $keywords = '';

      $url_error = "";
      $title_error = "";
      $artist_error = "";
      $category_error = "";
      $keywords_error = "";
      $repeat_error = "";
      
      // If form is submitted
      if (isset($_POST['submit'])){

        // Most form validation occurs here
        include('includes/form_validation.php');

        // If all errors are empty (all inputs are valid)
        if (empty($url_error) && empty($title_error) && empty($artist_error) && empty($category_error) && empty($keywords_error))
        {
          // Open data file
          $file = fopen("data.txt", "a+");      
          if (!$file) {
             die("There was a problem opening the data.txt file");
          }

          // Make an array of each entry
          $entries = array();
          while (!feof($file)){
            array_push($entries, fgets($file));
          }

          // Returns true if there is a repeat entry
          function check_repeat($entries, $str){
            foreach ($entries as $entry){
              if (strpos(strtolower($entry), $str) !== false){
                return true;
              }
            }
            return false;
          }

          $str = $delimiter . strtolower($title) . $delimiter . strtolower($artist) . $delimiter;
          $repeat = check_repeat($entries, $str);

          // If the entry is not a repeat one (same artist and title), add to catalog
          if (!$repeat){
            // Find the number of the last entry and add one
            $last = end($entries);
            $index = explode($delimiter, $last);
            $index = $index[0];
            $index = intval($index) + 1;
            
            $entry_string = $index . $delimiter . $url . $delimiter . $title . $delimiter . $artist . $delimiter . $category . $delimiter . $keywords;

            // Write in data file
            fwrite($file, "\r\n" . $entry_string);

            // Close data file
            fclose($file);

            // Redirect to index with search parameters
            header("Location: index.php");
          }
          // If the entry is a repeat, don't add and report error
          else{
            fclose($file);
            $repeat_error = 'Error: This entry has already been added to the catalog.';
          }
        }
      }
    ?>

    <div class="form_box">
      <h1>Add an Entry</h1>
      <a href="index.php">&lt; Back to Catalog</a>
      <br><br>
      <form action="form.php" method="post">
        
        <input type="url" name="url" placeholder="Image URL"  value="<?php echo $url; ?>"><div class="error"><?php echo $url_error; ?></div>
        <input type="text" name="title" placeholder="Title"  value="<?php echo $title; ?>"><div class="error"><?php echo $title_error; ?></div>
        <input type="text" name="artist" placeholder="Artist Username"  value="<?php echo $artist; ?>"><div class="error"><?php echo $artist_error; ?></div>
        <input type="text" name="keywords" placeholder="Keywords (separated by spaces)"  value="<?php echo $keywords; ?>"><div class="error"><?php echo $keywords_error; ?></div>
        <select name="category">
          <option value="none" <?php if($category == '') echo 'selected'; ?>>Category</option>
          <option value="digital"<?php if($category == 'digital') echo 'selected'; ?>>Digital</option>
          <option value="traditional" <?php if($category == 'traditional') echo 'selected'; ?>>Traditional</option>
          <option value="photography" <?php if($category == 'photography') echo 'selected'; ?>>Photography</option>
          <option value="other" <?php if($category == 'other') echo 'selected'; ?>>Other</option>
        </select><div class="error"><?php echo $category_error; ?></div>
        <input type="submit" name="submit" value="Submit"  class="submit">
        <?php echo $repeat_error; ?>
      </form>
    </div>
  </body>
</html>