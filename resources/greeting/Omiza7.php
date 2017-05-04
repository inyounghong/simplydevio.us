<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Omiza'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to Omiza!!');
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
$width  = (23 * strlen($longer_message));
$im = imagecreatetruecolor ($width,74);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 187, 0);
imagettftext($im, 30, 0, 36, 43, $color, $font, $new_message1);
imagettftext($im, 30, 0, 32, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>