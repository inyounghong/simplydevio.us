<?
header('Content-type: image/png');
include('../php/VisitorScraper.php');
$visitorScraper = new VisitorScraper("hazelstar67", false);
$visitor = $visitorScraper->getVisitor();
$new_message1 = str_replace('visitor', $visitor, 'So, visitor, you\'ve finally');
$new_message2 = str_replace('visitor', $visitor, 'decided to stop by.');

$text_box1 = imagettfbbox(18, 0, '../uploaded_fonts/lobster.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (20 * 2);

$text_box2 = imagettfbbox(18, 0, '../uploaded_fonts/lobster.ttf', $new_message2);
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

$y1 = 20 + 18;
$y2 = $y1 + 10 + $text_height;
$height = $y2 + 20 + 18/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 87, 43, 43);
imagefill($im,0,0,0x7fff0000);
$color = imagecolorallocate($im, 14, 32, 71);
imagettftext($im, 18, 0, $x1, $y1, $color, '../uploaded_fonts/lobster.ttf', $new_message1);
imagettftext($im, 18, 0, $x2, $y2, $color, '../uploaded_fonts/lobster.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>