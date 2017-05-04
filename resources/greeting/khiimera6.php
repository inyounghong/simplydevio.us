<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'khiimera'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor! Welcome to the den~');
$new_message2 = str_replace("visitor",$visitor, '');
$font = './uploaded_fonts/' . 'nomystery.ttf';
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
$width  = (23 * strlen($longer_message));
$im = imagecreatetruecolor ($width,84);
$background = imagecolorallocate($im, 255, 250, 250);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 235, 174, 188);
imagettftext($im, 30, 0, 33, 51, $color, $font, $new_message1);
imagettftext($im, 30, 0, 46, 47, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>