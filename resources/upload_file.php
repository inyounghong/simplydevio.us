<?php
$allowedExts = array("ttf", "ttc", "TTF");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if (($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
  } else {
    #echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    #echo "Type: " . $_FILES["file"]["type"] . "<br>";
    #echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    #echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("./greeting/uploaded_fonts/" . $_FILES["file"]["name"])) {
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "./greeting/uploaded_fonts/" . $_FILES["file"]["name"]);
    }
  }
} else {

}


#(($_FILES["file"]["type"] == "ttf"))
?>
