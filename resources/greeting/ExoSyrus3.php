<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ExoSyrus'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (30 * strlen($longer_message));
$im = imagecreatetruecolor ($width,66);
$background = imagecolorallocate($im, 14, 3, 54);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 238, 89, 255);
imagettftext($im, 31, 0, 51, 49, $color, $font, $new_message1);
imagettftext($im, 31, 0, 51, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>