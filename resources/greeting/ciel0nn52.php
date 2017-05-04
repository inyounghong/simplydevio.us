<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ciel0nn'");
$new_message1 = str_replace("visitor",$visitor, 'Ahoy, visitor!~');
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
$width  = (11 * strlen($longer_message));
$im = imagecreatetruecolor ($width,41);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 198, 57, 61);
imagettftext($im, 17, 0, 7, 29, $color, $font, $new_message1);
imagettftext($im, 17, 0, 200, 200, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>