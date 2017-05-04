<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'alkraas'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page :)');
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
$im = imagecreatetruecolor ($width,116);
$background = imagecolorallocate($im, 15, 15, 15);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 85, 170, 255);
imagettftext($im, 29, 0, 124, 41, $color, $font, $new_message1);
imagettftext($im, 29, 0, 45, 91, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>