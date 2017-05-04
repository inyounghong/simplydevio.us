<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'khiimera'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
$font = './uploaded_fonts/' . 'g_revo.ttf';
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
$im = imagecreatetruecolor ($width,86);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 23, 0, 48, 30, $color, $font, $new_message1);
imagettftext($im, 23, 0, 94, 75, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>