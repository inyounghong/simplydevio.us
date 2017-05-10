<?
session_start();
header('Content-type: image/png');
$visitor = exec('python ../python/image.py simplysilent visitor');
$new_message1 = str_replace('visitor', $visitor, 'Hey visitor!lkj');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my page!kj');

$text_box1 = imagettfbbox(27, 0, '../uploaded_fonts/blkchcry.TTF', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (55 * 2);

$text_box2 = imagettfbbox(27, 0, '../uploaded_fonts/blkchcry.TTF', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (55 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 55;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 55;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 135 + 27;
$y2 = $y1 + 19 + $text_height;
$height = $y2 + 135 + 27/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 58, 130, 196);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 224, 27, 27);
imagettftext($im, 27, 0, $x1, $y1, $color, '../uploaded_fonts/blkchcry.TTF', $new_message1);
imagettftext($im, 27, 0, $x2, $y2, $color, '../uploaded_fonts/blkchcry.TTF', $new_message2);
imagepng($im);
imagedestroy($im);
?>