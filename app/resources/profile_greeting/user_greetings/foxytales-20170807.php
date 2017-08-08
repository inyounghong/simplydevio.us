<?
header('Content-type: image/png');
$visitor = exec('python ../python/image.py foxytales visitor');
$new_message1 = str_replace('visitor', $visitor, 'Hey visitor!');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to Foxytales!');

$text_box1 = imagettfbbox(28, 0, '../uploaded_fonts/pacifico.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (21 * 2);

$text_box2 = imagettfbbox(28, 0, '../uploaded_fonts/pacifico.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (21 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 21;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 21;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 21 + 28;
$y2 = $y1 + 15 + $text_height;
$height = $y2 + 21 + 28/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,0x7fff0000);
$color = imagecolorallocate($im, 204, 106, 49);
imagettftext($im, 28, 0, $x1, $y1, $color, '../uploaded_fonts/pacifico.ttf', $new_message1);
imagettftext($im, 28, 0, $x2, $y2, $color, '../uploaded_fonts/pacifico.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>