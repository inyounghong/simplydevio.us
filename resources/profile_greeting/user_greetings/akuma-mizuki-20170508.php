<?
session_start();
header('Content-type: image/png');
$visitor = exec('python ../python/image.py akuma-mizuki visitor');
$new_message1 = str_replace('visitor', $visitor, 'Hey visitor!');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my page!');

$text_box1 = imagettfbbox(37, 0, '../uploaded_fonts/brain_flower.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (100 * 2);

$text_box2 = imagettfbbox(37, 0, '../uploaded_fonts/brain_flower.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (100 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 100;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 100;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 3 + 37;
$y2 = $y1 + 5 + $text_height;
$height = $y2 + 3 + 37/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,0x7fff0000);
$color = imagecolorallocate($im, 69, 59, 59);
imagettftext($im, 37, 0, $x1, $y1, $color, '../uploaded_fonts/brain_flower.ttf', $new_message1);
imagettftext($im, 37, 0, $x2, $y2, $color, '../uploaded_fonts/brain_flower.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>