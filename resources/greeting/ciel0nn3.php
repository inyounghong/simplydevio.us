<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ciel0nn'");
$new_message1 = str_replace("visitor",$visitor, 'Ahoy, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,33);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 222, 29, 42);
imagettftext($im, 15, 0, 14, 22, $color, $font, $new_message1);
imagettftext($im, 15, 0, 200, 200, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>