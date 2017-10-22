<?
header('Content-type: image/png');
include('../php/VisitorScraper.php');
$visitorScraper = new VisitorScraper("iityrano-chan", false);
$visitor = $visitorScraper->getVisitor();
$new_message1 = str_replace('visitor', $visitor, 'Hello, visitor!');
$new_message2 = str_replace('visitor', $visitor, 'Welcome to my page <3');

$text_box1 = imagettfbbox(28, 0, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (94 * 2);

$text_box2 = imagettfbbox(28, 0, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (94 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 94;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 94;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 29 + 28;
$y2 = $y1 + 11 + $text_height;
$height = $y2 + 29 + 28/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 209, 176, 235);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 71, 172);
imagettftext($im, 28, 0, $x1, $y1, $color, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message1);
imagettftext($im, 28, 0, $x2, $y2, $color, '../uploaded_fonts/determinationmonoweb-webfont.ttf', $new_message2);
imagepng($im);
imagedestroy($im);
?>