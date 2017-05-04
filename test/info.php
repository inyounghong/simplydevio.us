<?
header('Content-type: image/png');

$visitor = exec("python image.py");
$message = "Hey, " . substr($visitor, 0, -1) . "! Welcome to my page.";

$font = 'opensans.ttf';

// Create the image
$width  = (4.3 * strlen($message)) + 200;
$height = 30;

$im = imagecreatetruecolor ($width,$height);

// Create some colors
$background = imagecolorallocate($im, 29,39,65);
$color = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);

// Add the text
imagettftext($im, 12, 0, 3, 15, $color, $font, $message);

imagepng($im);
imagedestroy($im);

?>
