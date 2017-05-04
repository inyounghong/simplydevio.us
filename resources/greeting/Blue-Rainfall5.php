<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Blue-Rainfall'");
$new_message1 = str_replace("visitor",$visitor, 'Hiya, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'I see you there.');
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
$width  = (25 * strlen($longer_message));
$im = imagecreatetruecolor ($width,81);
$background = imagecolorallocate($im, 255, 254, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 21, 23, 0);
imagettftext($im, 28, 0, 0, 28, $color, $font, $new_message1);
imagettftext($im, 28, 0, 0, 71, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>