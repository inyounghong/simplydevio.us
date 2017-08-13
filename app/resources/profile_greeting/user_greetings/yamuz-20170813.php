<?
header('Content-type: image/png');
include('../php/VisitorScraper.php');
$visitorScraper = new VisitorScraper("yamuz", false);
$visitor = $visitorScraper->getVisitor();
$new_message1 = str_replace('visitor', $visitor, 'hey, visitor!');
$new_message2 = str_replace('visitor', $visitor, 'welcome to my page!');

$text_box1 = imagettfbbox(37, 0, '../uploaded_fonts/cheri.TTF', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (24 * 2);

$text_box2 = imagettfbbox(37, 0, '../uploaded_fonts/cheri.TTF', $new_message2);
$text_width2 = $text_box2[2] - $text_box2[0];
$full_width2 = $text_width2 + (24 * 2);

$text_height = $text_box2[1] - $text_box2[5];

if ($full_width1 >= $full_width2) {
    $width = $full_width1;
    $x1 = 24;
    $x2 = ($width - $text_width2)/2;
} else {
    $width = $full_width2;
    $x2 = 24;
    $x1 = ($width - $text_width1) / 2;
}

$y1 = 22 + 37;
$y2 = $y1 + 15 + $text_height;
$height = $y2 + 22 + 37/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 99, 185);
imagettftext($im, 37, 0, $x1, $y1, $color, '../uploaded_fonts/cheri.TTF', $new_message1);
imagettftext($im, 37, 0, $x2, $y2, $color, '../uploaded_fonts/cheri.TTF', $new_message2);
imagepng($im);
imagedestroy($im);
?>