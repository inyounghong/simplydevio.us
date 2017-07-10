<?
header('Content-type: image/png');
$visitor = exec('python ../python/image.py br0kenbunnies visitor');
$new_message1 = str_replace('visitor', $visitor, 'Greetings visitor');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my Trash!');

$text_box1 = imagettfbbox(30, 0, '../uploaded_fonts/trebuchet.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (74 * 2);

$text_box2 = imagettfbbox(30, 0, '../uploaded_fonts/trebuchet.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (74 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 74;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 74;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 66 + 30;
$y2 = $y1 + 13 + $text_height;
$height = $y2 + 66 + 30/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 199, 50, 50);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 30, 0, $x1, $y1, $color, '../uploaded_fonts/trebuchet.ttf', $new_message1);
imagettftext($im, 30, 0, $x2, $y2, $color, '../uploaded_fonts/trebuchet.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>