<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'bitter-beast'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor!');
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
$width  = (17 * strlen($longer_message));
$im = imagecreatetruecolor ($width,76);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 20, 255, 146);
imagettftext($im, 17, 0, 19, 23, $color, $font, $new_message1);
imagettftext($im, 17, 0, 20, 53, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>