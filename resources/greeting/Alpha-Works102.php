<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Alpha-Works'");
$new_message1 = str_replace("visitor",$visitor, 'Hello Visitor.');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to My Page!');
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
$width  = (50 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 56, 67, 120);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 30, 0, 200, 40, $color, $font, $new_message1);
imagettftext($im, 30, 0, 125, 99, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>