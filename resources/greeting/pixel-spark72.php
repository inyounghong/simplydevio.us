<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'pixel-spark'");
$new_message1 = str_replace("visitor",$visitor, 'Hay, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Great to see you!');
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
$width  = (48 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 33, 181, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 14, 6, 69);
imagettftext($im, 30, 0, 159, 79, $color, $font, $new_message1);
imagettftext($im, 30, 0, 200, 137, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>