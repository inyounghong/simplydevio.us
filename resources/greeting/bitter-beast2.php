<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'bitter-beast'");
$new_message1 = str_replace("visitor",$visitor, 'Heyo, visitor!');
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
$width  = (19 * strlen($longer_message));
$im = imagecreatetruecolor ($width,91);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 120, 255, 160);
imagettftext($im, 18, 0, 65, 34, $color, $font, $new_message1);
imagettftext($im, 18, 0, 48, 64, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>