<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'xoennah'");
$new_message1 = str_replace("visitor",$visitor, 'Hello there, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hope you enjoy my page!~');
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
$width  = (19 * strlen($longer_message));
$im = imagecreatetruecolor ($width,156);
$background = imagecolorallocate($im, 85, 47, 105);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 26, 0, 9, 47, $color, $font, $new_message1);
imagettftext($im, 26, 0, 33, 101, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>