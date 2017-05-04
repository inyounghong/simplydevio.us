<?php
  // Returns form get value or "" if there is no get value
  function setInput($name){
    if (isset($_GET[$name])){
      return $_GET[$name];
    }
    else{
      return "";
    }
  }

  // Returns the id (index) of the line in the data file that contains the given $str
  function getID($entries, $str){
    for ($i = 0; $i < count($entries); $i++){
      if (strpos(strtolower($entries[$i]), $str) !== false){
        return $i;
      }
    }
  }

  // Set up variables
  $delimiter = ' || ';

  $url = setInput('url');
  $title = setInput('title');
  $artist = setInput('artist');
  $category = setInput('category');
  $keywords = setInput('keywords');
  $id = 0;

  $url_error = "";
  $title_error = "";
  $artist_error = "";
  $category_error = "";
  $keywords_error = "";
  $repeat_error = "";

  // If form is deleted
  if (isset($_POST['delete'])){
    

    // Open data file
    $file = fopen("data.txt", "a+");      
    if (!$file) {
       die("There was a problem opening the data.txt file");
    }
    // Make an array of each entry
    $entries = array();
    while (!feof($file)){
      array_push($entries, trim(fgets($file)));
    }
    
    // Delete entry from array
    $title = strip_tags($_POST['title']);
    $artist = $_POST['artist'];
    $str = $delimiter . strtolower($title) . $delimiter . strtolower($artist) . $delimiter;
    $id = getID($entries, $str);
    unset($entries[$id]); 

    // Overwrite data.txt
    $entry_string = implode("\r\n", $entries);
    file_put_contents('data.txt', $entry_string);
    // Close data file
    fclose($file);
    // Redirect to index with search parameters
    header("Location: index.php");
  }
  
  // If form is submitted
  else if (isset($_POST['submit'])){
    // Form validation
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
        array_push($entries, trim(fgets($file)));
      }
      $str = $delimiter . strtolower($title) . $delimiter . strtolower($artist) . $delimiter;
      $id = getID($entries, $str);

      $entries[$id] = $id . $delimiter . $url . $delimiter . $title . $delimiter . $artist . $delimiter . $category . $delimiter . $keywords;

      // Overwrite data.txt
      $entry_string = implode("\r\n", $entries);
      file_put_contents('data.txt', $entry_string);
      // Close data file
      fclose($file);
      // Redirect to index with search parameters
      header("Location: index.php");
    }
  }
?>

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
    <div class="form_box">
      <h1>Edit an Entry</h1>
      <a href="index.php">&lt; Back to Catalog</a>
      <br><br>
      <form action="edit.php" method="post">
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
        <input type="submit" name="submit" value="Update"  class="submit half">
        <input type="submit" name="delete" value="Delete Entry"  class="delete half">
        <?php echo $repeat_error; ?>
      </form>
    </div>
  </body>
</html>