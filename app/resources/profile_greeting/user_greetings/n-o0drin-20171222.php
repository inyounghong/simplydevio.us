<?
header('Content-type: image/png');
include('../php/VisitorScraper.php');
$visitorScraper = new VisitorScraper("n-o0drin", false);
$visitor = $visitorScraper->getVisitor();
$new_message1 = str_replace('visitor', $visitor, 'Wow, its cold, huh visitor?');
$new_message2 = str_replace('visitor', $visitor, 'Let\'s take advantage of that and be lazy.');

$text_box1 = imagettfbbox(50, 0, '../uploaded_fonts/blkchcry.TTF', $new_message1);
$text_width1 = $text_box1[2] - $text_box1[0];
$full_width1 = $text_width1 + (20 * 2);

$text_box2 = imagettfbbox(50, 0, '../uploaded_fonts/blkchcry.TTF', $new_message2);
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

$y1 = 20 + 50;
$y2 = $y1 + 10 + $text_height;
$height = $y2 + 20 + 50/2;

$im = imagecreatetruecolor ($width, $height);
imagealphablending($im, true);
imagesavealpha($im, true);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,0x7fff0000);
$color = imagecolorallocate($im, 243, 255, 242);
imagettftext($im, 50, 0, $x1, $y1, $color, '../uploaded_fonts/blkchcry.TTF', $new_message1);
imagettftext($im, 50, 0, $x2, $y2, $color, '../uploaded_fonts/blkchcry.TTF', $new_message2);
imagepng($im);
imagedestroy($im);
?>