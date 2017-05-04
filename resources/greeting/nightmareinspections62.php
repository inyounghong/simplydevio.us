<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'nightmareinspections'");
$new_message1 = str_replace("visitor",$visitor, 'later days, visitor~');
$new_message2 = str_replace("visitor",$visitor, '');
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
$width  = (22 * strlen($longer_message));
$im = imagecreatetruecolor ($width,73);
$background = imagecolorallocate($im, 77, 47, 57);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 237, 180, 159);
imagettftext($im, 24, 0, 17, 41, $color, $font, $new_message1);
imagettftext($im, 24, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>