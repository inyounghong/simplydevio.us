<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'ExoSyrus'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
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
$width  = (27 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 99, 21, 21);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 184, 130);
imagettftext($im, 23, 0, 86, 38, $color, $font, $new_message1);
imagettftext($im, 23, 0, 85, 38, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>