<?php
if (isset($_FILES["file"])) {
    $allowedExts = array("ttf", "ttc", "TTF");
    $filename = strtolower(str_replace(" ", "_", $_FILES["file"]["name"]));
    $arr = explode(".", $filename);
    $extension = end($arr);

    if (($_FILES["file"]["size"] < 2000000) && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] == 0) {
            if (!file_exists("uploaded_fonts/" . $filename)) {
              move_uploaded_file($_FILES["file"]["tmp_name"], "uploaded_fonts/" . $filename);
            }
        }
    }
}
?>
