<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'preephoenix'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Welcome to my page');
$new_message2 = str_replace("visitor",$visitor, ' ');
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
$width  = (22 * strlen($longer_message));
$im = imagecreatetruecolor ($width,48);
$background = imagecolorallocate($im, 90, 131, 201);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 21, 0, 14, 30, $color, $font, $new_message1);
imagettftext($im, 21, 0, 197, 30, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>