<?
session_start();
header('Content-type: image/png');
$visitor = exec('python ../python/image.py starjito visitor');
$new_message1 = str_replace('visitor', $visitor, '* Greetings visitor');
$new_message2 = str_replace('visitor', $visitor, 'BEWARE OF DOG');

$text_box1 = imagettfbbox(15, 0, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (79 * 2);

$text_box2 = imagettfbbox(15, 0, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (79 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 79;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 79;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 59 + 15;
$y2 = $y1 + 30 + $text_height;
$height = $y2 + 59 + 15/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 15, 0, $x1, $y1, $color, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message1);
imagettftext($im, 15, 0, $x2, $y2, $color, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>