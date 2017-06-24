<?
session_start();
header('Content-type: image/png');
$visitor = exec('python ../python/image.py xy-a-z-z visitor');
$new_message1 = str_replace('visitor', $visitor, 'Hey visitor!');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my page!');

$text_box1 = imagettfbbox(47, 0, '../uploaded_fonts/where_stars_shine_the_brightest.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (109 * 2);

$text_box2 = imagettfbbox(47, 0, '../uploaded_fonts/where_stars_shine_the_brightest.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (109 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 109;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 109;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 1 + 47;
$y2 = $y1 + 10 + $text_height;
$height = $y2 + 1 + 47/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 255, 249, 213);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 180, 139, 102);
imagettftext($im, 47, 0, $x1, $y1, $color, '../uploaded_fonts/where_stars_shine_the_brightest.ttf', $new_message1);
imagettftext($im, 47, 0, $x2, $y2, $color, '../uploaded_fonts/where_stars_shine_the_brightest.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>