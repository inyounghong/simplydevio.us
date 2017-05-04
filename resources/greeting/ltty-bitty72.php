<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ltty-bitty'");
$new_message1 = str_replace("visitor",$visitor, 'WELCOME');
$new_message2 = str_replace("visitor",$visitor, 'visitor!');
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
$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,86);
$background = imagecolorallocate($im, 40, 51, 26);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 185, 247, 15);
imagettftext($im, 15, 0, 67, 36, $color, $font, $new_message1);
imagettftext($im, 15, 0, 33, 65, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>