<?
header('Content-type: image/png');
include('../php/VisitorScraper.php');
$visitorScraper = new VisitorScraper("sheepy-sailor", false);
$visitor = $visitorScraper->getVisitor();
$new_message1 = str_replace('visitor', $visitor, 'Hello, visitor!');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my profile!');

$text_box1 = imagettfbbox(50, 0, '../uploaded_fonts/brain_flower.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (48 * 2);

$text_box2 = imagettfbbox(50, 0, '../uploaded_fonts/brain_flower.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (48 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 48;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 48;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 30 + 50;
$y2 = $y1 + 8 + $text_height;
$height = $y2 + 30 + 50/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 39, 149, 212);
imagettftext($im, 50, 0, $x1, $y1, $color, '../uploaded_fonts/brain_flower.ttf', $new_message1);
imagettftext($im, 50, 0, $x2, $y2, $color, '../uploaded_fonts/brain_flower.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>