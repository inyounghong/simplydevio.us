<?
header('Content-type: image/png');
$visitor = exec('python ../python/image.py ohmyarien visitor');
$new_message1 = str_replace('visitor', $visitor, 'Hejsan');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my page');

$text_box1 = imagettfbbox(46, 0, '../uploaded_fonts/steinerlight.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (190 * 2);

$text_box2 = imagettfbbox(46, 0, '../uploaded_fonts/steinerlight.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (190 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 190;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 190;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 200 + 46;
$y2 = $y1 + 28 + $text_height;
$height = $y2 + 200 + 46/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 255, 56, 69);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 46, 0, $x1, $y1, $color, '../uploaded_fonts/steinerlight.ttf', $new_message1);
imagettftext($im, 46, 0, $x2, $y2, $color, '../uploaded_fonts/steinerlight.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>