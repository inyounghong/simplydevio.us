<?php
$dir = '../uploaded_fonts';
$files = scandir($dir);

$font_array = array();
$i = 2;
while ($i < count($files)) {
    array_push($font_array, $files[$i]);
    $i++;
}

echo json_encode($font_array);

?>
