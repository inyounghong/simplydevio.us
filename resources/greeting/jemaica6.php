<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'jemaica'");
$new_message1 = str_replace("visitor",$visitor, 'Hey visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
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
$width  = (27 * strlen($longer_message));
$im = imagecreatetruecolor ($width,82);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 43, 100, 255);
imagettftext($im, 23, 0, 155, 20, $color, $font, $new_message1);
imagettftext($im, 23, 0, 99, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>