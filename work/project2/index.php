<?php
  $delimiter = ' || ';
  // Initialize variables
  $title = '';
  $artist = '';
  $category = '';
  $keywords = '';

  // Converts inputs to lowercase and trims
  function convertInputs($input){
    $input = $_GET[$input];
    $string = strtolower(trim($input));
    return $string;
  }

  // When form is submitted, get the value of all search inputs
  if (isset($_GET['submit'])){
    $title = convertInputs('title');
    $artist = convertInputs('artist');
    $category = convertInputs('category');
    $keywords =  convertInputs('keywords'); // string with all keywords
  }

  // Array of search parameters
  $searchParams = array(
    'title' => $title, 
    'artist' => $artist, 
    'category' => $category,
    'keywords' => $keywords);

  // Contains the values of the searchParams
  $searchValues = array_values($searchParams);

  // Open data file
  $file = fopen("data.txt", "r");      
  if (!$file) {
     die("There was a problem opening the guests.txt file");
  }

  // Get each line as an array
  $entries = array();
  while (!feof($file)){
    array_push($entries, fgets($file));
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
    <h1>Artwork Catalog</h1>

    <!-- Search Form -->
    <div class="search_box">
      <form action="index.php" method="GET">
        <input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>">
        <input type="text" name="artist" placeholder="Artist" value="<?php echo $artist; ?>">
        <input type="text" name="keywords" placeholder="Keywords" value="<?php echo $keywords; ?>">
        <select name="category">
          <option value="" <?php if($category == '') echo 'selected'; ?>>Any Medium</option>
          <option value="digital"<?php if($category == 'digital') echo 'selected'; ?>>Digital</option>
          <option value="traditional" <?php if($category == 'traditional') echo 'selected'; ?>>Traditional</option>
          <option value="photography" <?php if($category == 'photography') echo 'selected'; ?>>Photography</option>
          <option value="other" <?php if($category == 'other') echo 'selected'; ?>>Other</option>
        </select>
        <input type="submit" name="submit" value="search" class="search">
      </form>
      <br><br>
      <a href="index.php">&lt; Back to Catalog</a> | <a href="form.php">Add an Entry &gt;</a>
    </div>

    <div class="gallery">
    <?php
      // Loop through array and get entries
      foreach ($entries as $entry){
        $entry = explode($delimiter, $entry);
        $art_keywords = preg_split("/\s+/", trim($entry[5]));
        $search_keywords = preg_split("/\s+/", trim($keywords));

        // Array for matched values
        $match = array();

        // For non-keyword matching
        for ($i = 0; $i < 4; $i++){
          $match[$i] = 0;
          $search = $searchValues[$i];
          $str = strtolower(trim($entry[$i + 2]));
          
          // If search value is empty, change match value to 1
          if (empty($search)){
            $match[$i] = 1;
          }
          else{
            if ($search == $str){
              $match[$i] = 1;
            }
          }
        }

        // For keyword matching
        foreach ($search_keywords as $s_keyword){
          if (in_array($s_keyword, $art_keywords)){
            array_push($match, 1);
          }
            array_push($match, 0);
        }
        
        
        // If the sum of the match array equals the total number of search parameters, display the entry
        if (array_sum($match) == count($search_keywords) + 3){
          echo '<div class="entry">';
          echo '<div class="thumb" style="background-image: url(' . $entry[1] . ')"></div>';
          
          $keyword_string = "";
          $keyword_link = ""; // For the edit button
          // Loop through each keyword to create links
          foreach ($art_keywords as $keyword){
            $keyword_string .= '<a href="index.php?title=&amp;artist=&amp;keywords=' . $keyword . '&amp;category=&amp;submit=search">#' . $keyword . '</a> ';
            $keyword_link .= $keyword . '+';
          }
          $keyword_link = substr($keyword_link, 0, -1);
          // Edit button
          $url_string = $entry[1] . '&amp;title=' . urlencode($entry[2]) . '&amp;artist=' . $entry[3] . '&amp;keywords=' . $keyword_link . '&amp;category=' . $entry[4] . '&amp;submit=search';

          echo '<a class="edit" href="edit.php?url=' . $url_string . '">Edit</a>';

          // Artwork info
          echo '<div class="info">';
          echo '<h3>' . $entry[2] . '</h3>';
          echo '<h4>by ' . $entry[3] . '</h4>';
          echo '<div class="keywords"><span class="category"><a href="index.php?title=&amp;artist=&amp;keywords=&amp;category=' . $entry[4] . '&amp;submit=search" >' . $entry[4] . '</a></span>';
          echo $keyword_string;
          echo '</div></div></div>';
        }
      }  
    ?>
      <div class="credits">
        <a href="credits.php">Artwork Credits</a>
      </div>
    </div>


  </body>
 
</html>