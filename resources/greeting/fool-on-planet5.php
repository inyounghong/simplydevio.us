<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'fool-on-planet'");
$new_message1 = str_replace("visitor",$visitor, 'what\'s good visitor?');
$new_message2 = str_replace("visitor",$visitor, ' ');
$font = './uploaded_fonts/' . 'DoubleFeature20.ttf';
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
$im = imagecreatetruecolor ($width,100);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 20, 0, 25, 57, $color, $font, $new_message1);
imagettftext($im, 20, 0, 175, 100, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>