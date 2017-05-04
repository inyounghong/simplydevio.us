<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py '6SmileFor6TheCamera6'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Here\'s A little bit about me! ');
$font = './uploaded_fonts/' . 'ComingSoon.ttf';
# Determine the longer of the two  messages
if (strlen($new_message2) > 0)
{
    if (strlen($new_message1) <= strlen($new_message2))
    {
        $longer_message = $new_message2;
    }
    else
    {
        $longer_message = $new_message1;
    }
}
else
{
    $longer_message = $new_message1;
}
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 19, 0, 0, 20, $color, $font, $new_message1);
imagettftext($im, 19, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>