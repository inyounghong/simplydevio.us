<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'miidway'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome, visitor!');
$new_message2 = str_replace("visitor",$visitor, '');
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
$width  = (34 * strlen($longer_message));
$im = imagecreatetruecolor ($width,129);
$background = imagecolorallocate($im, 173, 221, 233);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 50, 0, 21, 58, $color, $font, $new_message1);
imagettftext($im, 50, 0, 49, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>