<?
session_start();
header('Content-type: image/png');
$visitor = exec('python ../python/image.py umbra-regina visitor');
$new_message1 = str_replace('visitor', $visitor, 'Hello, visitor!');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my page! Have a llama!');

$text_box1 = imagettfbbox(20, 0, '../uploaded_fonts/arberkley.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (20 * 2);

$text_box2 = imagettfbbox(20, 0, '../uploaded_fonts/arberkley.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (20 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 20;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 20;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 20 + 20;
$y2 = $y1 + 17 + $text_height;
$height = $y2 + 20 + 20/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 212, 32, 206);
imagefill($im,0,0,0x7fff0000);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 20, 0, $x1, $y1, $color, '../uploaded_fonts/arberkley.ttf', $new_message1);
imagettftext($im, 20, 0, $x2, $y2, $color, '../uploaded_fonts/arberkley.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>