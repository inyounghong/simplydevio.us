<?
session_start();
header('Content-type: image/png');
$visitor = exec('python ../python/image.py sweetchoia visitor');
$new_message1 = str_replace('visitor', $visitor, 'hey visitor,');
$new_message2 = str_replace('visitor', $visitor, 'how goes it?');

$text_box1 = imagettfbbox(33, 0, '../uploaded_fonts/arberkley.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (36 * 2);

$text_box2 = imagettfbbox(33, 0, '../uploaded_fonts/arberkley.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (36 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 36;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 36;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 26 + 33;
$y2 = $y1 + 10 + $text_height;
$height = $y2 + 26 + 33/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 245, 157, 156);
imagettftext($im, 33, 0, $x1, $y1, $color, '../uploaded_fonts/arberkley.ttf', $new_message1);
imagettftext($im, 33, 0, $x2, $y2, $color, '../uploaded_fonts/arberkley.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>