<?
header('Content-type: image/png');
$visitor = exec('python ../python/image.py night-blitz-217 visitor');
$new_message1 = str_replace('visitor', $visitor, 'Hey visitor. Good to see ya :)');
$new_message2 = str_replace('visitor', $visitor, '');

$text_box1 = imagettfbbox(50, 0, '../uploaded_fonts/arberkley.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (102 * 2);

$text_box2 = imagettfbbox(50, 0, '../uploaded_fonts/arberkley.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (102 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 102;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 102;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 37 + 50;
$y2 = $y1 + 0 + $text_height;
$height = $y2 + 37 + 50/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 7, 0, 148);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 255, 255);
imagettftext($im, 50, 0, $x1, $y1, $color, '../uploaded_fonts/arberkley.ttf', $new_message1);
imagettftext($im, 50, 0, $x2, $y2, $color, '../uploaded_fonts/arberkley.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>