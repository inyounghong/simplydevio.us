<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'moondash'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome ');
$new_message2 = str_replace("visitor",$visitor, 'to my page,');
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
$width  = (30 * strlen($longer_message));
$im = imagecreatetruecolor ($width,139);
$background = imagecolorallocate($im, 232, 240, 236);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 44, 54, 53);
imagettftext($im, 30, 0, 72, 56, $color, $font, $new_message1);
imagettftext($im, 30, 0, 61, 99, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>