<?
header('Content-type: image/png');
include('../php/VisitorScraper.php');
$visitorScraper = new VisitorScraper("ubebread", false);
$visitor = $visitorScraper->getVisitor();
$new_message1 = str_replace('visitor', $visitor, 'Ey visitor!');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my page!');

$text_box1 = imagettfbbox(29, 0, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (22 * 2);

$text_box2 = imagettfbbox(29, 0, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (22 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 22;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 22;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 20 + 29;
$y2 = $y1 + 6 + $text_height;
$height = $y2 + 20 + 29/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,0x7fff0000);
$color = imagecolorallocate($im, 255, 186, 230);
imagettftext($im, 29, 0, $x1, $y1, $color, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message1);
imagettftext($im, 29, 0, $x2, $y2, $color, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>